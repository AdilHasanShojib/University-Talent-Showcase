<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'talent_showcase');

// Ensure the user is logged in
if (!isset($_SESSION['faculty_id'])) {
    header('Location: login.php');
    exit;
}

// Fetch the logged-in faculty details
$faculty_id = $_SESSION['faculty_id'];

// Query to get the faculty details, including profile_photo
$facultyQuery = "SELECT faculty_name, profile_photo FROM faculties WHERE id = $faculty_id";
$facultyResult = $conn->query($facultyQuery);

if ($facultyResult->num_rows > 0) {
    $facultyData = $facultyResult->fetch_assoc();
    $faculty_name = $facultyData['faculty_name'];
    $faculty_photo = $facultyData['profile_photo']; // Assuming this is the path to the image file
} else {
    echo "Faculty not found!";
    exit;
}

// Check if the faculty is a judge
$judgeQuery = "SELECT * FROM judges WHERE faculty_id = $faculty_id";
$isJudge = $conn->query($judgeQuery)->num_rows > 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="admin_control_8.css">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .card {
            background-color: #fff;
        }

        .faculty-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div style="width: 100%; height: 1vh; background-color: #F68B1F;"></div>

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
                    <a class="nav-link" href="#">Welcome, <?php echo $faculty_name; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" href="index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-5 offset-md-2">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Faculty Dashboard
                    </div>
                    <div class="card-body text-center">
                        <!-- Display Faculty Image -->
                        <img src="uploads/faculties/<?php echo $faculty_photo; ?>" alt="Faculty Photo" class="faculty-photo">
                        
                        <h5 class="card-title">Hello, <?php echo $faculty_name; ?></h5>
                        <p class="card-text">
                            <?php if ($isJudge) { ?>
                                You are a judge. You can rate the content.
                                <br><br>
                                <a href="judgeRating.php" class="btn btn-success">Rate Content</a>
                            <?php } else { ?>
                                You are not assigned as a judge.
                            <?php } ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
