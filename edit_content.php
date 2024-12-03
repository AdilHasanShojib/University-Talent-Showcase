<?php
include 'database.php';

// Fetch content data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM content_uploads WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['description']);
    $content_id = $_POST['id'];
    $content_type = $_POST['content_type']; 

    if (!empty($_FILES['file']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

        $sql = "UPDATE content_uploads SET title = '$title', content_file = '$target_file', content_type = '$content_type' WHERE id = $content_id";
    } else {
        $sql = "UPDATE content_uploads SET title = '$title', content_type = '$content_type' WHERE id = $content_id";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Content updated successfully!";
        header('Location: my_content.php'); 
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Content</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap-icons.css">
    <link rel="stylesheet" href="basic_template.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">



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
    <div class="row col-lg-8 border rounded mx-auto mt-5 p-4 shadow-lg">
        <section class="text-center">
            <h2>Edit Content</h2>
            <form action="edit_content.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-4">
                    <label class="form-label">Upload New File (if needed)</label>
                    <input type="file" name="file" class="form-control mx-auto" style="width: 500px;">
                </div>
                <div class="mb-4">
                    <select class="form-select mx-auto" name="content_type" style="width: 500px;" required>
                        <option value="">Select Content Type</option>
                        <option value="image" <?php echo ($row['content_type'] == 'image') ? 'selected' : ''; ?>>Image</option>
                        <option value="video" <?php echo ($row['content_type'] == 'mp4') ? 'selected' : ''; ?>>Video</option>
                        <option value="audio" <?php echo ($row['content_type'] == 'mp3') ? 'selected' : ''; ?>>Audio</option>
                        <option value="other" <?php echo ($row['content_type'] == 'text') ? 'selected' : ''; ?>>Other</option>
                    </select>
                </div>
                <div class="mb-4">
                    <textarea class="form-control mx-auto" style="width: 500px;" name="description" placeholder="Content Description..." rows="8" required><?php echo $row['title']; ?></textarea>
                </div>
                <input type="submit" name="submit" class="btn btn-danger ml-auto" value="UPDATE" style="margin-right: 20px;">
            </form>
        </section>
    </div>
</body>
</html>
