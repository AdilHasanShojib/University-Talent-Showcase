<?php
// Include the database connection
$conn = new mysqli('localhost', 'root', '', 'talent_showcase');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch top 3 students based on highest ratings
$query = "
    SELECT cu.student_name, cu.student_id, cu.title, cu.content_file, 
           AVG(r.rating) as avg_rating, COUNT(r.rating) as rating_count
    FROM ratings r
    JOIN content_uploads cu ON r.content_id = cu.id
    GROUP BY cu.id
    ORDER BY avg_rating DESC, rating_count DESC
    LIMIT 3";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 3 Candidates</title>
    <link rel="stylesheet" href="basic_template.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
       

        .container {
            width: 50%;
            margin: 150px auto;
            text-align: center;
            background:#F68B1F; /* Semi-transparent background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        h1 {
            margin-bottom: 20px;
        }

        .candidate {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc; /* Light border */
            border-radius: 5px;
            background: #f9f9f9; /* Light background for candidates */
        }

        .candidate img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .candidate .medal {
            font-size: 2em;
        }

        .view-profile-btn {
            background-color: #E45127;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1em;
        }

        .medal.gold { color: gold; }
        .medal.silver { color: silver; }
        .medal.bronze { color: #873600; }

        .candidate-info {
            flex-grow: 1;
            text-align: left;
            margin-left: 20px;
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
    <h1>Top 3 Candidates</h1>
    <?php 
    $medals = ['🥇', '🥈', '🥉'];
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) { 
        if ($i >= 3) break; // Limit to top 3 candidates

        // Fetch the image for the current student from the s_users table
        $student_id = $row['student_id'];
        $image_query = "SELECT image FROM s_users WHERE studentid = '$student_id'";
        $image_result = mysqli_query($conn, $image_query);
        $image_row = mysqli_fetch_assoc($image_result);
        $image_path = $image_row['image']; // Get the image path
    ?>
        <div class="candidate">
            <div <span class="medal"><?php echo $medals[$i]; ?> </span>
            </div>
            <div class="candidate-info">
                <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                <p>Uploader: <?php echo htmlspecialchars($row['student_name']) . " / " . htmlspecialchars($row['student_id']); ?></p>
                <p>Rating: <?php echo round($row['avg_rating'], 2); ?></p>
                <button class="view-profile-btn" onclick="window.location.href='viewProfile.php?student_id=<?php echo htmlspecialchars($row['student_id']); ?>'">View Profile</button>

            </div>
            <img src="uploads/profile/<?php echo htmlspecialchars($image_path); ?>" alt="Candidate Image">
        </div>
    <?php 
        $i++;
    } 
    ?>
</div>

</body>
</html>
