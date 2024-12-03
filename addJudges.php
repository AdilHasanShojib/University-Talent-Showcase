<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'talent_showcase');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the Add Judge functionality
if (isset($_POST['add_judge'])) {
    $faculty_id = $_POST['faculty_id'];

    // Check if the faculty is already a judge
    $checkQuery = "SELECT * FROM judges WHERE faculty_id = $faculty_id";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows == 0) {
        // Insert into judges table
        $insertQuery = "INSERT INTO judges (faculty_id) VALUES ('$faculty_id')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "<p style='color: green;'></p>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "<p style='color: red;'>This faculty is already a judge!</p>";
    }
}

// Fetch all faculties from the database
$query = "SELECT * FROM faculties";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Judge</title>
     <link rel="stylesheet" href="admin_control_8.css">
    <style>
      
        h1 {
            margin-top:40px;
            text-align: center;
            font-weight: bold;
        }

        .faculty-list {
            margin-top: 30px;
        }

        .faculty-item {
            display: flex;
            margin: 5px auto 0;
            justify-content: space-between;
            background-color:  #F68B1F;
            align-items: center;
            margin-bottom: 20px;
            max-width: 40%;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .faculty-details {
            display: flex;
            align-items: center;
        }

        .faculty-details img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .faculty-info {
            font-size: 1.2em;
        }

        .add-btn {
            padding: 8px 16px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
        }

        .add-btn:hover {
            background-color: darkgreen;
        }

        .search-bar {
            text-align: right;
            margin-bottom: 20px;
        }

        .search-bar input {
            padding: 10px;
            font-size: 1em;
            width: 200px;
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
                            <a class="menu" href="a_home.php">Home</a>
                        </td>
                        <td>
                            <a class="menu" href="content_approval.php">Content Approval</a>
                        </td>
                        <td>
                            <a class="menu" href="addFaculties.php">Faculty Management</a>

                        </td>
                        <td>
                             <a class="menu" href="">Judge Management</a> 
                       </td>


                        <td>
                            <a class="menu" href="create_event_12.html">Event Management</a>
                        </td>
                       
                        
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <h1>Add Judge</h1>

    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Search here" onkeyup="searchFaculty()">
    </div>

    <div class="faculty-list" id="facultyList">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="faculty-item">
                <div class="faculty-details">
                    <img src="uploads/faculties/<?php echo $row['profile_photo']; ?>" alt="Faculty Image">
                    <div class="faculty-info">
                        <p><?php echo $row['faculty_name']; ?></p>
                        <p><?php echo $row['designation']; ?>, <?php echo $row['department']; ?></p>
                    </div>
                </div>
                <form method="POST" style="margin: 0;">
                    <input type="hidden" name="faculty_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="add_judge" class="add-btn">Add</button>
                </form>
            </div>
        <?php } ?>
    </div>

    <script>
        function searchFaculty() {
            let input = document.getElementById('searchInput');
            let filter = input.value.toLowerCase();
            let facultyList = document.getElementById('facultyList');
            let facultyItems = facultyList.getElementsByClassName('faculty-item');

            for (let i = 0; i < facultyItems.length; i++) {
                let facultyInfo = facultyItems[i].getElementsByClassName('faculty-info')[0];
                let textValue = facultyInfo.textContent || facultyInfo.innerText;
                if (textValue.toLowerCase().indexOf(filter) > -1) {
                    facultyItems[i].style.display = "";
                } else {
                    facultyItems[i].style.display = "none";
                }
            }
        }
    </script>

</body>
</html>

<?php
$conn->close();
?>
