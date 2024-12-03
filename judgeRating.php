<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'talent_showcase');

// Ensure the user is logged in
if (!isset($_SESSION['faculty_id'])) {
    header('Location: login.php');
    exit;
}

$faculty_id = $_SESSION['faculty_id'];
$faculty_name = $_SESSION['faculty_name'];

// Fetch the content from the database
$query = "SELECT * FROM content_uploads where approval_status = 1";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judge Rating</title>
    <link rel="stylesheet" href="judge.css">
    <link rel="stylesheet" href="admin_control_8.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
           font-family: Arial, sans-serif;
           background-image: url(""); 
           background-color: #fff;
           height: 500px; /* You must set a specified height */
           background-position: center; /* Center the image */
           background-repeat: no-repeat; /* Do not repeat the image */
           background-size: cover;
        }

        h1 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .content-list {
            max-width: 800px;
            margin: 0 auto;
            color: blue;
        }

        .content-item {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 15px 0;
            background-color: #F68B1F;
        }

        .media-container {
            width: 30%;
            max-width: 200px;
            margin-right: 20px;
        }

        .media-container img, .media-container video, .media-container audio, .media-container iframe {
            width: 100%;
        }

        .content-details {
            width: 50%;
        }

        .content-details h3 {
            margin: 0;
            font-size: 1.2em;
            font-weight: bold;
        }

        .content-details p {
            margin: 5px 0;
            color: black;;
        }

        .rating-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 2em;
            color: black; /* Default black color */
            cursor: pointer;
        }

        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: gold; /* Gold color when selected */
        }

        .rate-btn {
            padding: 8px 16px;
            background-color: #E45127;
            
            color: white;
            border: none;
            cursor: pointer;
            margin-left: 20px;
        }

        .rate-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div style="width: 100%; height: 1vh; background-color: #F68B1F;">

    </div>

        <div id="div_top_left">
            <img src="Images/header-logo.png" height="40px" width="auto">
        </div>
        
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <h3>UNIVERSITY TALENT SHOWCASE</h3>
       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" href="index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <h1>Judge Rating</h1>

    <div class="content-list">
        <?php while ($row = mysqli_fetch_assoc($result)) { 
            // Check if this judge already rated this content
            $content_id = $row['id'];
            $checkRatingQuery = "SELECT * FROM ratings WHERE judge_id = $faculty_id AND content_id = $content_id";
            $alreadyRated = mysqli_query($conn, $checkRatingQuery);
        ?>
            <div class="content-item">
                <div class="media-container">
                    <?php if ($row['content_type'] == 'mp4') { ?>
                        <video controls>
                            <source src="uploads/<?php echo $row['content_file']; ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php } elseif ($row['content_type'] == 'mp3') { ?>
                        <audio controls>
                            <source src="uploads/<?php echo $row['content_file']; ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    <?php } elseif ($row['content_type'] == 'text') { ?>
                        <iframe src="uploads/<?php echo $row['content_file']; ?>" frameborder="0" scrolling="auto"></iframe>
                    <?php } elseif ($row['content_type'] == 'image') { ?>
                        <img src="uploads/<?php echo $row['content_file']; ?>" alt="Content Image">
                    <?php } ?>
                </div>

                <div class="content-details">
                    <h3><?php echo isset($row['title']) ? $row['title'] : 'Title of the uploaded Content'; ?></h3>
                    <p>Uploader: <?php echo isset($row['student_name']) ? $row['student_name'] : 'Student Name'; ?></p>
                    <p>ID: <?php echo isset($row['student_id']) ? $row['student_id'] : 'Student ID'; ?></p>
                    <p>Time: <?php echo isset($row['upload_time']) ? date("d F Y  h:i A", strtotime($row['upload_time'])) : '20 June 2024  08:20 PM'; ?></p>
                </div>

                <div class="rating-container">
                    <?php if (mysqli_num_rows($alreadyRated) > 0) { ?>
                       
                    <?php } else { ?>
                        <form action="submitRating.php" method="POST">
                            <input type="hidden" name="content_id" value="<?php echo $row['id']; ?>">
                            <div class="star-rating">
                                <input type="radio" id="5-stars-<?php echo $row['id']; ?>" name="rating" value="5" />
                                <label for="5-stars-<?php echo $row['id']; ?>">★</label>
                                <input type="radio" id="4-stars-<?php echo $row['id']; ?>" name="rating" value="4" />
                                <label for="4-stars-<?php echo $row['id']; ?>">★</label>
                                <input type="radio" id="3-stars-<?php echo $row['id']; ?>" name="rating" value="3" />
                                <label for="3-stars-<?php echo $row['id']; ?>">★</label>
                                <input type="radio" id="2-stars-<?php echo $row['id']; ?>" name="rating" value="2" />
                                <label for="2-stars-<?php echo $row['id']; ?>">★</label>
                                <input type="radio" id="1-star-<?php echo $row['id']; ?>" name="rating" value="1" />
                                <label for="1-star-<?php echo $row['id']; ?>">★</label>
                            </div>
                            <button type="submit" class="rate-btn">Submit Rating</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        
    </div>
   
   

</body>
</html>
