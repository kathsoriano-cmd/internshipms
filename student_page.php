<?php
session_start();
$full_name = isset($_SESSION['full_name']) ? $_SESSION['full_name'] : 'Guest';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Page</title>

  <link rel="stylesheet" type="text/css" href="css/adm.css">
  <link rel="stylesheet" href="../css/chatbot.css">
</head>

<body>   <!-- ✅ moved here (correct) -->

<nav>
  <label class="logo">INTERNBUDDY.IMS</label>
  <ul>
    <li><a href="">ORIENTATION</a></li>
    <li><a href="">APPLICATION</a></li>
    <li><a href="">JOB VACANCIES</a></li>
    <li><a href="">REPORTS</a></li>
    <li><a href="index.php">LOGOUT</a></li>
  </ul>
</nav>

<section class="home" id="home">
  <div class="row">
    <div class="content">
      <h1>Orientation Attendance</h1><br>
      <p>Hello, <strong><?php echo htmlspecialchars($full_name); ?></strong>
      Thank you for attending the orientation for Second Semester AY 2024 - 2025. <br>
      You may now view or download your certificate for your reference, and proceed to the next step of internship.</p>
      <br>
      <a href="files/3CITG6.pdf" download>
      <button type="submit" name="download">View/Download your certificate</button>
      </a>
      <br>
    </div>
  </div>
</section>

<!-- CHATBOT FLOATING WIDGET (now works perfectly) -->
<iframe 
    src="http://127.0.0.1:5000" 
    style="
        width: 450px;
        height: 600px;
        position: fixed;
        bottom: 20px;
        right: 20px;
        border: none;
        border-radius: 15px;
        overflow: hidden;
        z-index: 9999;">
</iframe>

</body>
</html>
