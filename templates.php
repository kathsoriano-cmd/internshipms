
<?php
include 'db_connect.php';

$query = "SELECT * FROM form_templates ORDER BY id ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/adm.css">
    <title>Form Templates</title>
</head>
<body><br><br><br><br>
    <h1>Templates</h1><br>
    <p>Manages templates that will be used for internship</p>
 <nav>
    <label class="logo">INTERNBUDDY.IMS</label>
      <ul>
      <li><a href="admin_page.php">Back to Home</a></li>
    </ul>
  </nav> <br> 
    <button class="add-btn" onclick="window.location.href='add_template.php'">Add</button>
    
    <div class="controls">
        <label>Show</label>
        <select>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <label>entries</label>
        
        <div style="margin-left: auto;">
            <label>Search:</label>
            <input type="search" placeholder="">
        </div>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Form Name</th>
                <th>Form Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['template_name']); ?></td>
                <td><?php echo htmlspecialchars($row['template_description']); ?></td>
                <td>
                    <a href="view_template.php?id=<?php echo $row['id']; ?>" class="action-btn btn-view">View</a>
                    <a href="edit_template.php?id=<?php echo $row['id']; ?>" class="action-btn btn-edit">Edit</a>
                    <a href="publish_template.php?id=<?php echo $row['id']; ?>" class="action-btn btn-publish">Publish</a>
                    <a href="delete_template.php?id=<?php echo $row['id']; ?>" 
                       class="action-btn btn-delete" 
                       onclick="return confirm('Are you sure you want to delete this template?')">Delete</a>
                </td>
            </tr>
            <?php 
                }
            } else {
            ?>
            <tr>
                <td colspan="5" style="text-align: center; padding: 20px;">No templates found</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
