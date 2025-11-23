<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'db_connect.php';

if (isset($_POST["register"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = $_POST["role"];
    $course_major = $_POST["course_major"];
    $verification_code = rand(100000, 999999);
    $is_verified = 0;

    $full_name = $first_name . ' ' . $last_name;

    $conn = new mysqli("localhost", "root", "", "internship_db");
    $query = "INSERT INTO users (first_name, last_name, email, password, role, course_major, is_verified, verification_code)
              VALUES ('$first_name', '$last_name', '$email', '$password', '$role', '$course_major', '$is_verified', '$verification_code')";

    if ($conn->query($query)) {

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kathsoriano29@gmail.com'; // your Gmail
            $mail->Password = 'dwjlnrivuenktuqg'; // App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('kathsoriano29@gmail.com', 'InternBuddy IMS');
            $mail->addAddress($email, $full_name);

            $mail->isHTML(true);
            $mail->Subject = 'Your OTP Verification Code';
            $mail->Body = "
                <h2>Hello $full_name!</h2>
                <p>Your One-Time Password (OTP) is:</p>
                <h1 style='color:#2d89ef;'>$verification_code</h1>
                <p>Enter this code on the website to verify your account.</p>
                <p>This code will expire after 10 minutes.</p>
            ";

            $mail->send();

            session_start();
            $_SESSION['email'] = $email;
            header("Location: verify_otp.php?email=" . urlencode($email));
            exit();
        } catch (Exception $e) {
            echo "Failed to send OTP. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Database insert failed: " . $conn->error;
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];  
            $_SESSION['email'] = $user['email'];
            if ($user['role'] === 'Admin') {
                header("Location: admin_page.php");
                exit();
            } elseif ($user['role'] === 'Instructor') {
                header("Location: instructor.php");
                exit();
            } elseif ($user['role'] === 'Employer') {
                header("Location: employer.php");
                exit();
            } elseif ($user['role'] === 'Student') {
                header("Location: student_page.php");
                exit();
            } else {
                // Default fallback
                header("Location: login.php");
                exit();
            }
        }
    }
    $_SESSION['login_error'] = 'Incorrect email or password.';
    $_SESSION['active_form'] = 'login';
    header("Location: login.php");
    exit();
}
?>

