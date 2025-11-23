

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Page | Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="css/adm.css">
  
</head>

<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
  <nav>
    <label class="logo">INTERNBUDDY.IMS</label>

      <ul>
      <li><a href="admin_page.php">HOME</a></li>
      <li class="dropdown">
        <a href="#">INTERNSHIP PORTAL <i class="fas fa-caret-down"></i></a>
        <div class="dropdown__menu">
            <ul>
                <li><a href="orientationrec.php">Orientation Record</a> </li>
                <li><a href="templates.php">Templates</a> </li>
            </ul>
        </div>
        </li>
      <li><a href="company_profile.php">JOB PORTAL</a></li>
      <li><a href="configuration.php">MANAGE PROFILE</a></li>
      <li><a href="index.php">LOGOUT</a></li>
    </ul>
  </nav>
   <body>
    <br> <br> <br> <br>
    <h1>This is the Admin page</h1> <br>
    <p>Displays all users of the system - students, administrators, and industry partners</p>

</body>
</html>