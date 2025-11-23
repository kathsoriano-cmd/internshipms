

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Users Management | Admin</title>
  <link rel="stylesheet" type="text/css" href="css/adm.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

  <nav>
    <label class="logo">INTERNBUDDY.IMS</label>

      <ul>
      <li><a href="admin_page.php">HOME</a></li>
      <li><a href="configuration.php" class="active">MANAGE PROFILE</a></li>
      <li><a href="index.php">LOGOUT</a></li>
    </ul>
  </nav>
   <body style="margin: 50px;">
    <br> <br>   
    <h1>Users</h1>
    <p>Displays all users of the system - students, administrators, and industry partners</p>
    <br>
    <div class="role-selector">
            <label for="role">Select Role:</label>
            <select id="role">
                <option value="Admin">Admin</option>
                <option value="Instructor">Instructor</option>
                <option value="Employer">Employer</option>
                <option value="Student">Student</option>
            </select>
        </div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Course and Major</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $servername ="localhost";
            $username = "root";
            $password = "";
            $dbname = "internship_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed.". $conn->connect_error);
            }

            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if (!$result) {
                die("Invalid query: " . $conn->connect_error);
            } 

            while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["first_name"] . "</td>
                <td>" . $row["last_name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["role"] . "</td>
                <td>" . $row["course_major"] . "</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='users_edit.php?id=" . $row['id'] . "'>Update</a>
                    <a class='btn btn-danger btn-sm' href='usersdelete.php?id=" . $row['id'] . "'>Delete</a>
                </td>
            </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>