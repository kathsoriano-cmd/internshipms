<?php
// users_edit.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ---------------------------
// 1️⃣  Get the user ID
// ---------------------------
if (!isset($_GET['id'])) {
    die("User ID not provided.");
}

$id = intval($_GET['id']);

// ---------------------------
// 2️⃣  Fetch user data
// ---------------------------
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("User not found.");
}

$user = $result->fetch_assoc();

// ---------------------------
// 3️⃣  Handle form submission
// ---------------------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $course_major = $_POST["course_major"];

    $update_sql = "UPDATE users 
                   SET first_name='$first_name', 
                       last_name='$last_name', 
                       email='$email', 
                       role='$role',
                       course_major='$course_major'
                   WHERE id=$id";

    if ($conn->query($update_sql)) {
        echo "<script>alert('User updated successfully!'); window.location='configuration.php';</script>";
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
    <h2>Edit User</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">First Name:</label>
            <input type="text" name="first_name" class="form-control" value="<?= htmlspecialchars($user['first_name']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Last Name:</label>
            <input type="text" name="last_name" class="form-control" value="<?= htmlspecialchars($user['last_name']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Role:</label>
            <select name="role" class="form-select" required>
                <option value="Admin" <?= ($user['role'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                <option value="Instructor" <?= ($user['role'] == 'Instructor') ? 'selected' : ''; ?>>Instructor</option>
                <option value="Employer" <?= ($user['role'] == 'Employer') ? 'selected' : ''; ?>>Employer</option>
                <option value="Student" <?= ($user['role'] == 'Student') ? 'selected' : ''; ?>>Student</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Course & Major:</label>
            <select name="course_major" class="form-select" required>
                <option value="BS Math - PURE" <?= ($user['course_major'] == 'BS Math - PURE') ? 'selected' : ''; ?>>III-BS Mathematics Major in Pure Mathematics</option>
                <option value="BS Math - CIT" <?= ($user['course_major'] == 'BS Math - CIT') ? 'selected' : ''; ?>>III-BS Mathematics Major in Computer Information Technology</option>
                <option value="BS Math - STATS" <?= ($user['course_major'] == 'BS Math - STATS') ? 'selected' : ''; ?>>III-BS Mathematics Major in Statistics</option>
                <option value="Admin" <?= ($user['course_major'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="configuration.php" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>
