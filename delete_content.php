<?php
include 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT content_file FROM content_uploads WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $file_path = $row['content_file'];

    $sql = "DELETE FROM content_uploads WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        header('Location: my_content.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
