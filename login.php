<?php 

session_start();

$errors = [
  'login' => $_SESSION['login_error'] ?? '',
  'register' => $_SESSION['register_error'] ?? ''
];
$success = $_SESSION['registration_success'] ??'';
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
  return !empty($error) ? "<p class = 'error-message'>$error</p>" : '';
}

function showSuccess($success) {
  return !empty($success) ? "<p class='success-message'>$success</p>" : '';
}

function isActiveForm($formName, $activeForm) {
  return $formName === $activeForm ? 'active' : '';
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>INTERNBUDDY.IMS</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<nav>
  <label class="logo">INTERNBUDDY.IMS</label>
  <ul>
      <li><a href="index.php">BACK TO HOME</a></li>
    </ul>
</nav>
  
<div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
  <form action="login_register.php" method="post">
    <h2>LOGIN</h2>
    <?= showError($errors['login']); ?>
    <label> Username </label>
    <input type="email" name="email" placeholder="Email" required>
    <label> Password </label>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
    <label class="highlighted">Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></label>
  </form> 
</div>

<div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
  <form action="login_register.php" method="post">
    <h2>REGISTRATION</h2>
    <?= showError($errors['register']); ?>
    <?= showSuccess($success);?>
    
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="confirm_password" placeholder="Retype Password" required>

    <!-- ROLE SELECTION -->
    <select name="role" id="role" onchange="toggleFields()" required>
      <option value="">-- Select Role --</option>
      <option value="Admin">Admin</option>
      <option value="Instructor">Instructor</option>
      <option value="Employer">Employer</option>
      <option value="Student">Student</option>
    </select>

    <!-- STUDENT-ONLY FIELDS -->
    <div id="studentFields" style="display:none;">
      <select name="course_major">
        <option value="">Select Year Level Course and Major</option>
        <option value="BS MATH - PURE">III-BS Mathematics Major in Pure Mathematics</option>
        <option value="BS MATH - CIT">III-BS Mathematics Major in Computer Information Technology</option>
        <option value="BS MATH - STATS">III-BS Mathematics Major in Statistics</option>
      </select>
    </div>

    <button type="submit" name="register">Register</button>
    <label class="highlighted">Already have an account? <a href="#" onclick="showForm('login-form')">Sign in</a></label>
  </form>
</div>

<script src="script.js"></script>

<!-- NEW JAVASCRIPT FOR HIDING/SHOWING FIELDS -->
<script>
function toggleFields() {
  const role = document.getElementById("role").value;
  const studentFields = document.getElementById("studentFields");

  if (role === "Student") {
    studentFields.style.display = "block";
  } else {
    studentFields.style.display = "none";
  }
}

// If form reloads with student role selected, keep fields visible
document.addEventListener("DOMContentLoaded", toggleFields);
</script>

</body>
</html>
