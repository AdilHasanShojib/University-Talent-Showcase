<?php
// Include the database connection
$conn = new mysqli('localhost', 'root', '', 'talent_showcase');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if student_id is provided in the URL
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    // Fetch student information from the s_users table
    $query = "SELECT * FROM s_users WHERE studentid = '$student_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result); // Fetch the student details
    } else {
        echo "No student found with this ID.";
        exit;
    }
} else {
    echo "No student ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="basic_template.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #F68B1F ;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .profile-info {
            margin-top: 20px;
        }
        .profile-info h4 {
            margin-bottom: 10px;
        }
        .profile-info p {
            margin: 5px 0;
        }
        .profile-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .btn-back {
            margin-top: 20px;
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

<div class="container">
    <div class="profile-container text-center">
        <h2>Student Profile</h2>
        
        <!-- Display Student Image -->
        <img class="profile-img" src="uploads/profile/<?php echo htmlspecialchars($student['image']); ?>" alt="Student Image">

        <!-- Display Student Information -->
        <div class="profile-info">
            <h4><?php echo htmlspecialchars($student['name']); ?></h4>
            <p><strong>Student ID:</strong> <?php echo htmlspecialchars($student['studentid']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($student['email']); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($student['gender']); ?></p>
            
            
            <p><strong>LinkedIn:</strong> <a href="<?php echo htmlspecialchars($student['linkedin']); ?>" target="_blank"><?php echo htmlspecialchars($student['linkedin']); ?></a></p>
            <p><strong>Facebook:</strong> <a href="<?php echo htmlspecialchars($student['facebook']); ?>" target="_blank"><?php echo htmlspecialchars($student['facebook']); ?></a></p>
            <p><strong>Department:</strong> <?php echo htmlspecialchars($student['department']); ?></p>
            <p><strong>CGPA:</strong> <?php echo htmlspecialchars($student['cgpa']); ?></p>
            <p><strong>Credit:</strong> <?php echo htmlspecialchars($student['c_credit']); ?></p>
        </div>

        <!-- Back Button -->
        <a href="resultPublication.php" class="btn btn-primary btn-back">Back</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
