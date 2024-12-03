<?php
// Database connection settings

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "talent_showcase";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);




// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle approval/rejection actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['content_id'];
    $action = $_POST['action'];

    if ($action == 'approve') {
        $sql = "UPDATE content_uploads SET approval_status = 1 WHERE id = ?";
    } elseif ($action == 'reject') {
        $sql = "UPDATE content_uploads SET approval_status = 2 WHERE id = ?";
    }

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
    }
}

// Query to get unapproved content (approval_status = 0)
$sql = "SELECT id, title, student_name, upload_time, content_file, content_type FROM content_uploads WHERE approval_status = 0";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Approval</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="create_event_12.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
    .card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .card-body {
        flex-grow: 1;
    }
    </style>

</head>
<body>
<div style="width: 100%; height: 1vh; background-color: #f68b1f"></div>

<div id="div_top">
  <div id="div_top_left">
    <img src="Images/header-logo.png" height="40px" width="auto" />
  </div>
  <div id="div_top_right">
    <div id="div_top_menu_container">
      <table>
       <tr>
    <td><a class="menu" href="a_home.php"><i class="fas fa-home"></i> Home</a></td>
    <td><a class="menu" href="content_approval.php"><i class="fas fa-check"></i> Content Approval</a></td>
    <td><a class="menu" href="addFaculties.php"><i class="fas fa-users"></i> Faculty Management</a></td>
    <td><a class="menu" href="judgeManagement.php"><i class="fas fa-gavel"></i> Judge Management</a></td>
    <td><a class="menu" href="create_event_12.html"><i class="fas fa-calendar-plus"></i> Event Management</a></td>
    <td><a class="nav-link btn btn-danger text-white" href="index.php"><i class="fas fa-sign-out-alt"></i> Logout</a></td>
</tr>
      </table>
    </div>
  </div>
</div>
<div id="UIU_Logo_container">
        <img
          id="UIU_Logo"
          src="images/UIU_LOGO.png"
          height="100px"
          width="auto"
        />
      </div>
      <p
        style="
          text-align: center;
          font-size: 30px;
          font-weight: bold;
          font-family: Verdana, Geneva, Tahoma, sans-serif;
        "
      >
      Pending Content Approvals
      </p>
<div class="container my-5">
    <div class="row">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $title = $row['title'];
            $student_name = $row['student_name'];
            $upload_time = date("F j, Y, g:i a", strtotime($row['upload_time']));
            $content_file = $row['content_file'];
            $content_type = $row['content_type'];

            // Determine content image or media based on content type
            $content_path = '';
            if ($content_type == 'text') {
                // Embed PDF directly
                $content_file = '<iframe src="uploads/' . $content_file . '" frameborder="0" scrolling="auto" style="width: 400px; height: 300px;"></iframe>';
            } else if ($content_type == 'mp3') {
                // Embed audio
                $content_file = '<audio controls><source src="uploads/' . $content_file . '" type="audio/mpeg">Your browser does not support the audio element.</audio>';
            } elseif ($content_type == 'mp4') {
                // Embed video
                $content_file = '<video controls style="width: 400px; height: 300px;"><source src="uploads/' . $content_file . '" type="video/mp4">Your browser does not support the video element.</video>';
            } else {
                // Assume it's an image if none of the above
                $content_file = '<img src="uploads/' . $content_file . '" class="img-fluid" style="width: 400px; height: 300px;"  alt="' . $title . '">';
            }
            ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 d-flex flex-column"> <!-- Flexbox for equal height -->
                    <div class="card-img-top">
                        <?= $content_file ?>
                    </div>
                    <div class="card-body flex-grow-1 d-flex flex-column">
                        <h5 class="card-title"><?= $title ?></h5>
                        <p class="card-text">Uploaded by: <?= $student_name ?></p>
                        <p class="card-text">Upload Time: <?= $upload_time ?></p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <form method="POST" action="">
                            <input type="hidden" name="content_id" value="<?= $id ?>">
                            <input type="hidden" name="action" value="approve">
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                        <form method="POST" action="">
                            <input type="hidden" name="content_id" value="<?= $id ?>">
                            <input type="hidden" name="action" value="reject">
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>No content pending approval.</p>";
    }
    ?>
    </div>


</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
