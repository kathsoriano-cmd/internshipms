<?php 
if (isset(($_POST["verify_email"]))) {
    $email = $_POST['email'];
    $verification_code = $_POST["verification_code"];

    $conn = mysqli_connect("localhost","root","","internship_db");

     if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $stmt = $conn->prepare("UPDATE users SET is_verified = 1 WHERE email = ? AND verification_code = ?");
    $stmt->bind_param("ss", $email, $verification_code);
    $stmt->execute();

    if ($stmt->affected_rows == 0) { 
        die("Verification failed. Please check your code and try again.");
    }

    echo "<p>Email verified successfully! You can now <a href='login.php'>log in</a>.</p>";

    $stmt->close();
    $conn->close();
}
?>

    <form method="POST" action="verify_otp.php">
        <h2>Get Code From Your Email</h2>
        <p class="text">We want to make sure it's really you. In order to further verify your identity, enter the verification code that was sent to  </p>
        <input type="hidden" name="email" 
               value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>" 
               required>

        <input type="text" name="verification_code" placeholder="Enter verification code" required />
        <input type="submit" name="verify_email" value="Verify Email">
    </form>

