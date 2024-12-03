<?php
// Database connection settings
$host = "localhost";
$dbname = "talent_showcase";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the event ID from the URL query string
$event_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Prepare and execute the SQL query to fetch event details
$sql = "SELECT title, description, image, start_time, end_time FROM event WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $event_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the event details
$event = $result->fetch_assoc();

if (!$event) {
    die("Event not found.");
}

// Close the database connection
$stmt->close();
$conn->close();

// Format the start_time and end_time using PHP's DateTime class
$startDateTime = new DateTime($event['start_time']);
$endDateTime = new DateTime($event['end_time']);

// Get formatted date and time
$startDate = $startDateTime->format('M d, Y');  // e.g., "Oct 05, 2024"
$startTime = $startDateTime->format('h:i A');  // e.g., "02:00 PM"
$endDate = $endDateTime->format('M d, Y');
$endTime = $endDateTime->format('h:i A');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="create_event_12.css" />
</head>
<body>
<div style="width: 100%; height: 1vh; background-color: #f68b1f"></div>

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
                             <a class="menu" href="s_home.php">Home</a>
                        </td>
                        <td>
                            <a class="menu" href="s_contentsubmit.php">Upload</a>
                        </td>
                        <td>
                           <a class="menu" href="upcoming_event_8.html">Event</a>  
                        </td>
                        <td>
                        <a class="menu" href="my_content.php">My Content</a>
                        </td>
                        <td>
                            <a class="menu" href="resultPublication.php">Result</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div id="UIU_Logo_container">
            <img
            id="UIU_Logo"
            src="Images/UIU_LOGO.png"
            height="100px"
            width="auto"
            />
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <img src="<?php echo $event['image']; ?>" class="card-img-top" alt="<?php echo $event['title']; ?>">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $event['title']; ?></h3>
                        <p class="card-text"><?php echo $event['description']; ?></p>

                        <hr>

                        <h5>Event Timing</h5>
                        <p><strong>Start:</strong> <?php echo $startDate . ' at ' . $startTime; ?></p>
                        <p><strong>End:</strong> <?php echo $endDate . ' at ' . $endTime; ?></p>

                        <a href="upcoming_event_8.html" class="btn btn-primary">Back to Events</a>
                        <a href="contentUpload.php" class="btn btn-success">Participate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>
