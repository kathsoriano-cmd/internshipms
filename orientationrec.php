<?php
include 'db_connect.php';

$query = "SELECT * FROM orientation_records ORDER BY event_date ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/adm.css">
    <title>Orientation Record</title>
</head>
<body><br><br><br><br>
    <h1>Orientation Records</h1><br>
    <p>Manages the records of the  current and past orientation</p>
 <nav>
    <label class="logo">INTERNBUDDY.IMS</label>
      <ul>
      <li><a href="admin_page.php">Back to Home</a></li>
    </ul>
  </nav>
  <br>
    <table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Orientation Title</th>
            <th>Venue</th>
            <th>Date</th>
            <th>Time</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>

            <td><?php echo $row['orientation_title']; ?></td>

            <td><?php echo $row['venue']; ?></td>

            <!-- Display date as October 13, 2005 -->
            <td><?php echo date("F j, Y", strtotime($row['event_date'])); ?></td>

            <!-- Display time as 8:00 AM - 5:00 PM -->
            <td>
                <?php 
                    echo date("g:i A", strtotime($row['start_time'])) . " - " . 
                         date("g:i A", strtotime($row['end_time']));
                ?>
            </td>

            <td>
                <a href="view_event.php?id=<?php echo $row['id']; ?>">View</a> |
                <a href="orient_event/edit_event.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_event.php?id=<?php echo $row['id']; ?>" 
                onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>