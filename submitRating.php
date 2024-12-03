<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'talent_showcase');

// Ensure the user is logged in
if (!isset($_SESSION['faculty_id'])) {
    header('Location: login.php');
    exit;
}

// Get the faculty_id from the session
$faculty_id = $_SESSION['faculty_id'];

// Get the content_id and rating from the POST request
$content_id = $_POST['content_id'];
$rating = $_POST['rating'];

// Get the judge_id corresponding to the faculty_id
$judgeQuery = "SELECT id FROM judges WHERE faculty_id = ?";
$stmt = $conn->prepare($judgeQuery);
$stmt->bind_param("i", $faculty_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("You are not registered as a judge.");
}

$judge = $result->fetch_assoc();
$judge_id = $judge['id'];

// Check if the judge has already rated this content
$checkQuery = "SELECT * FROM ratings WHERE judge_id = ? AND content_id = ?";
$stmt = $conn->prepare($checkQuery);
$stmt->bind_param("ii", $judge_id, $content_id);
$stmt->execute();
$checkResult = $stmt->get_result();

if ($checkResult->num_rows > 0) {
    // Judge already rated this content
     echo '<div style="text-align: center; margin-top: 20px;">';
    echo '<h1 style="font-size: 2.5rem; color: #ff0000;">You have already rated this content.Thank you!</h1>'; // Styled text
    echo '<a href="judgeRating.php" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; font-size: 1.2rem; border-radius: 5px;">Back to Rating</a>'; // Back button
    echo '</div>';
   
} else {
    // Insert the new rating into the database
    $insertQuery = "INSERT INTO ratings (judge_id, content_id, rating) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("iii", $judge_id, $content_id, $rating);

    if ($stmt->execute()) {
        // Redirect to judgeRating.php after successful submission
        
        header('Location: judgeRating.php');
        echo "Content has been rated successfully.Thank you!";

        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

$stmt->close();
$conn->close();
?>
