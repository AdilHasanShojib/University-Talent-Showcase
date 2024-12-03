<?php
session_start(); 
if (!isset($_SESSION['suser'])) {
    header('Location: s_login.php'); 
    exit();
}

include 'database.php';

$student_id = $_SESSION['sstudentid'];
$query = "SELECT * FROM content_uploads WHERE student_id = '$student_id'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Content</title>
    <link rel="stylesheet" href="my_content.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

     <link rel="stylesheet" href="basic_template.css">
</head>
<body>
<div style="width: 100%; height: 1vh; background-color: #F68B1F;">
    
    </div>

    <div id="div_top">
        <div id="div_top_left">
            <img src="Images/header-logo.png" height="40px" width="auto">
        </div>
        <div id="div_top_right">
            <div id="div_top_menu_container">
                <table>
                    <tr>
    <td>
        <a class="menu" href="s_home.php">
            <i class="fas fa-home"></i> Home
        </a>
    </td>
    <td>
        <a class="menu" href="upcoming_event_8.html">
            <i class="fas fa-calendar-alt"></i> All Events
        </a>
    </td>
    <td>
        <a class="menu" href="my_content.php">
            <i class="fas fa-file-alt"></i> My Content
        </a>
    </td>
    <td>
        <a class="menu" href="s_contentsubmit.php">
            <i class="fas fa-upload"></i> Upload
        </a>
    </td>
    <td>
        <a class="menu" href="resultPublication.php">
            <i class="fas fa-trophy"></i> Result
        </a>
    </td>
</tr>

                </table>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <h2 align="center">My Content</h2>
        <hr>
        <?php 
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="content-item">
                <img src="uploads/<?php echo $row['content_file']; ?>" alt="Content">
                <div class="content-info">
                    <h3><?php echo $row['title']; ?></h3>
                    <p>Uploader: <?php echo $row['student_name']; ?> / ID: <?php echo $row['student_id']; ?></p>
                    <p>Time: <?php echo date("d M Y h:i A", strtotime($row['upload_time'])); ?></p>
                </div>
                <div class="actions">
                    <a href="edit_content.php?id=<?php echo $row['id']; ?>" class="edit-btn">Edit</a>
                    <a href="delete_content.php?id=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this content?');">Delete</a>
                </div>
            </div>
        <?php } 
        } else {
            echo "<p>No content found for you.</p>";
        }
        ?>
    </div>
</body>
</html>
