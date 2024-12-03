<?php
    session_start();
    if (!isset($_SESSION['suser'])) {
        session_destroy();
        header('Location: s_login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="basic_template.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    
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

    <?php
    require_once "database.php";

    if (isset($_POST['submit'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $content_description = mysqli_real_escape_string($conn, $_POST['description']);
        $uploader_name = $_SESSION['sname'];
        $uploader_id = $_SESSION['sstudentid']; 
        $upload_time = date('Y-m-d H:i:s');
        $content_type = mysqli_real_escape_string($conn, $_POST['content_type']);

        $target_dir = "uploads/"; 
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $upload_ok = 1;
        $file_name = basename($_FILES["file"]["name"]); 
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($upload_ok && move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO content_uploads (title, student_name, student_id, upload_time, content_file, content_type, content_description) 
                    VALUES ('$title', '$uploader_name', '$uploader_id', '$upload_time', '$file_name', '$content_type', '$content_description')";

            if (mysqli_query($conn, $sql)) {
                echo "Content uploaded successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    ?>

    <div class="row col-lg-8 border rounded mx-auto mt-5 p-4 shadow-lg">
       <section class="text-center" style="background-color:  #F68B1F;">
            <form action="s_contentsubmit.php" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <h2 class="form-label">Upload your Content</h2><br>
                    <input type="file" name="file" class="form-control mx-auto" style="width: 500px;" required>
                </div>
                <div class="mb-4">
                    <input type="text" name="title" class="form-control mx-auto" placeholder="Content Title" style="width: 500px;" required>
                </div>
                <div class="mb-4">
                    <select class="form-select mx-auto" name="content_type" style="width: 500px;" required>
                        <option value="">Select Content Type</option>
                        <option value="image">Image</option>
                        <option value="mp4">Video</option>
                        <option value="mp3">Audio</option>
                        <option value="text">Blog</option>
                    </select>
                </div>
                <div class="mb-4">
                    <textarea class="form-control mx-auto" style="width: 500px;" name="description" placeholder="Content Description..." rows="8" required></textarea>
                </div>
                <input type="submit" name="submit" class="btn btn-success ml-auto" value="SUBMIT" style="margin-right: 20px;">
            </form>
        </section>
    </div>
</body>
</html>
