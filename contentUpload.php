<?php
if (isset($_POST['submit'])) {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'talent_showcase');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Getting form data
    $student_name = $conn->real_escape_string($_POST['student_name']);
    $student_id = $conn->real_escape_string($_POST['student_id']);
    $content_type = $conn->real_escape_string($_POST['content_type']);
    $content_description = $conn->real_escape_string($_POST['content_description']);
    $title = $conn->real_escape_string($_POST['title']); // Capture the title from the form

    // File upload handling
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_folder = "uploads/" . $file_name;

    // Move the uploaded file to the 'uploads' folder
    if (move_uploaded_file($file_tmp, $file_folder)) {
        // Insert into the database
        $sql = "INSERT INTO content_uploads (student_name, student_id, content_type, content_description, content_file, title)
                VALUES ('$student_name', '$student_id', '$content_type', '$content_description', '$file_name', '$title')";

        if ($conn->query($sql) === TRUE) {
            echo "File uploaded successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload file.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Your Content</title>
    <link rel="stylesheet" href="basic_template.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style> 
  body {
           font-family: Arial, sans-serif;
           background-image: url(""); 
           background-color: #fff;
           height: 500px; /* You must set a specified height */
           background-position: center; /* Center the image */
           background-repeat: no-repeat; /* Do not repeat the image */
           background-size: cover;
           justify-content: center;
           
          
}



.upload-form {
            background-color:  #F68B1F;
            padding: 30px;
            margin: 15px auto 0;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 50%;
            max-width: 600px;
            max-height: 850px;
         
            
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            margin-bottom: 1.5rem;
        }

  </style>

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
                            <a class="menu" href="">Home</a>
                        </td>
                        <td>
                            <a class="menu" href="">All Events</a>
                        </td>
                        <td>
                            <a class="menu" href="">My Content</a>
                        </td>
                        <td>
                            <a class="menu" href="">Favourites</a>
                        </td>
                        <td>
                            <a class="menu" href="">Upload</a>
                        </td>
                        <td>
                            <a class="menu" href="resultPublication.php">Result</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="upload-form">
        <h2 class="text-center mb-4">Upload Your Content</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col">
                    <label for="student_name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Enter your name" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="student_id" class="form-label">Student ID:</label>
                    <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter your Student ID" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="content_type" class="form-label">Select Content Type:</label>
                    <select class="form-select" id="content_type" name="content_type" required>
                        <option value="" disabled selected>Select content type</option>
                        <option value="mp3">MP3 (Audio)</option>
                        <option value="mp4">MP4 (Video)</option>
                        <option value="image">Image</option>
                        <option value="text">Text (Article)</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="content_description" class="form-label">Description About The Content:</label>
                    <textarea class="form-control" id="content_description" name="content_description" rows="4" placeholder="Write a brief description..."></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="file" class="form-label">Upload File:</label>
                    <input type="file" class="form-control" id="file" name="file" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="title" class="form-label">Content Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter content title" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary btn-lg" name="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>

