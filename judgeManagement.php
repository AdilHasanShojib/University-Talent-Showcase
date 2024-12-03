<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'talent_showcase');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle removing the judge
if (isset($_POST['remove_judge'])) {
    $faculty_id = $_POST['faculty_id']; // Use faculty_id instead of judge_id

    //echo "faculty_id: " . $faculty_id;

    // Delete from judges table where faculty_id matches
    $deleteQuery = "DELETE FROM judges WHERE faculty_id = $faculty_id";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<p style='color: green;'></p>";
    } else {
        echo "Error: " . $conn->error;
    }
}





// Fetch all judges from the database
$query = "SELECT j.faculty_id, f.faculty_name, f.designation, f.department, f.profile_photo 
          FROM judges j 
          JOIN faculties f ON j.faculty_id = f.id";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judge Management</title>
    <link rel="stylesheet" href="admin_control_8.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       

       

        .judge-list {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .judge-item {
            text-align: center;
            margin-bottom: 20px;
        }

        .judge-item img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }

        .remove-btn {
            padding: 8px 16px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        .remove-btn:hover {
            background-color: darkred;
        }

        .add-judge-btn {
            display: block;
            width: 150px;
            padding: 10px;
            background-color: green;
            color: white;
            text-align: center;
            margin: 30px auto;
            text-decoration: none;
            font-size: 16px;
        }

        .add-judge-btn:hover {
            background-color: darkgreen;
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
    <td><a class="menu" href=""><i class="fas fa-home"></i> Home</a></td>
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

    <div class="container mt-5">
    

    <!-- Judge List -->
    <div class="row justify-content-center">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="col-md-4 mb-4">
                <div class="card text-center h-100">
                    <!-- Judge Photo -->
                    <img src="uploads/faculties/<?php echo htmlspecialchars($row['profile_photo']); ?>" class="card-img-top" alt="Judge Photo" style="width:100px; height:100px; object-fit:cover; margin: 20px auto; border-radius: 50%;">

                    <!-- Judge Info -->
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['faculty_name']); ?></h5>
                        <p class="card-text">
                            <?php echo htmlspecialchars($row['designation']); ?>, 
                            <br>
                            <?php echo htmlspecialchars($row['department']); ?>
                        </p>
                    </div>

                    <!-- Remove Judge Button -->
                    <div class="card-footer">
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="faculty_id" value="<?php echo htmlspecialchars($row['faculty_id']); ?>">
                            <button type="submit" name="remove_judge" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


</div>
<a href="addJudges.php" class="add-judge-btn">Add Judge</a>

</body>
</html>

<?php
$conn->close();
?>
