<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "talent_showcase";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get all events
$sql = "SELECT id, title, description, image FROM event";
$result = $conn->query($sql);

$events = [];

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
    } else {
        // No events found
        echo json_encode(['message' => 'No events found']);
    }
} else {
    // Query failed
    echo json_encode(['error' => 'Database query failed: ' . $conn->error]);
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($events);

// Close connection
$conn->close();
?>
