<?php
$message = ""; // Variable to store the success or error message

// Handle the form submission
if (isset($_POST['submit'])) {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'talent_showcase');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $faculty_name = $conn->real_escape_string($_POST['faculty_name']);
    $designation = $conn->real_escape_string($_POST['designation']);
    $department = $conn->real_escape_string($_POST['department']);
    
    // File upload handling
    $profile_photo = $_FILES['profile_photo']['name'];
    $file_tmp = $_FILES['profile_photo']['tmp_name'];
    $file_folder = "uploads/faculties/" . $profile_photo;

    // Move uploaded file to 'uploads' folder
    if (move_uploaded_file($file_tmp, $file_folder)) {
        // Insert into the faculties table
        $sql = "INSERT INTO faculties (faculty_name, designation, department, profile_photo)
                VALUES ('$faculty_name', '$designation', '$department', '$profile_photo')";
        
        if ($conn->query($sql) === TRUE) {
            $message = "Faculty added successfully!";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $message = "Failed to upload profile photo.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Faculty</title>
     <link rel="stylesheet" href="admin_control_8.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        .form-container {
            width: 50%;
            margin: 50px auto;
            padding: 30px;
            background-color:  #F68B1F;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .message {
            color: green;
            text-align: center;
            margin-bottom: 20px;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
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


    <!-- Display the success or error message -->
    <?php if ($message != ""): ?>
        <div class="container">
            <div class="alert alert-<?php echo (strpos($message, 'successfully') !== false) ? 'success' : 'danger'; ?>">
                <?php echo $message; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="container form-container">
        <h1>Add Faculty</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="faculty_name">Faculty Name</label>
                <input type="text" class="form-control" id="faculty_name" name="faculty_name" placeholder="Faculty Name" required>
            </div>
            
            <div class="form-group">
                <label for="designation">Position</label>
                <input type="text" class="form-control" id="designation" name="designation" placeholder="Position" required>
            </div>
            
            <div class="form-group">
                <label for="department">Department</label>
                <select class="form-control" id="department" name="department" required>
                    <option value="">Select Department</option>
                    <option value="CSE">CSE</option>
                    <option value="EEE">EEE</option>
                    <option value="BBA">BBA</option>
                    <!-- Add more departments as needed -->
                </select>
            </div>
            
            <div class="form-group">
                <label for="profile_photo">Profile Photo</label>
                <input type="file" class="form-control-file" id="profile_photo" name="profile_photo" required>
            </div>
            
            <button type="submit" class="btn btn-success btn-block" name="submit">Add</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>














