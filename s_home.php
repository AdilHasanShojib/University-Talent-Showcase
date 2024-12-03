<?php
session_start();
if (!isset($_SESSION['suser'])) {
    session_destroy();
    header('Location: s_login.php');
}
include 'database.php';

$content_type = isset($_GET['type']) ? $_GET['type'] : ''; 

if ($content_type) {
    $query = "SELECT * FROM content_uploads WHERE content_type = '$content_type'";
} else {
    $query = "SELECT * FROM content_uploads"; 
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="s_home.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="basic_template.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <title>Student Home</title>
    <style>
        /* Modal (popup) Styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div>
            <div style="float:left;padding-left:36px">
                <img src="<?php echo "uploads/profile/".$_SESSION["simage"] ?>" width="40px" alt="image">
            </div>
            <div style="float:right;padding-right:36px">
                <a href="s_profile.php"><?php echo $_SESSION["sname"]; ?></a>
            </div>
        </div>
        <div style="padding-top: 100px;padding-bottom: 20px;">
            <hr>
            <a href="s_home.php">Home</a>
            <a href="s_contentsubmit.php">Upload</a>
            <a href="upcoming_event_8.html">Event</a>
            <a href="my_content.php">My Content</a>
            
        </div>
        <a href="logout.php">Logout</a>
    </div>

    <div class="searchbarWrapper">
        <span onclick="openNav()">
            <img src="https://cdn4.iconfinder.com/data/icons/wirecons-free-vector-icons/32/menu-alt-512.png" alt="Menu Icon" width="40px">
        </span>
    </div>

    <div class="container">
        <!-- Sidebar Section -->
        <aside class="sidebar">
            <div class="category">
                <h3>All</h3>
                <ul>
                    <li><a href="s_home.php?type=image">Photography</a></li>
                    <li><a href="s_home.php?type=mp4">Video</a></li>
                    <li><a href="s_home.php?type=mp3">Music</a></li>
                    <li><a href="s_home.php?type=text">Blog</a></li>
                </ul>
            </div>
            <div class="upcoming-events">
                <h3>Upcoming Events</h3>
                <div class="event">
                    <p>Photography Contest</p>
                    <p>Date : 7/9/2024</p>
                </div>
                <div class="event">
                    <p>Photography Contest</p>
                    <p>Date : 12/10/2024</p>
                </div>
            </div>
        </aside>

        <div class="content">
            <section class="top-section">
                <h2><?php echo $content_type ? ucfirst($content_type) : 'All Content'; ?></h2>
                <div class="content-grid">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="content-item">';
                            if ($row['content_type'] == 'image') {
                                echo '<img src="uploads/' . $row['content_file'] . '" alt="Image">';
                            } elseif ($row['content_type'] == 'mp4') {
                                echo '<video controls width="100%">
                                        <source src="uploads/' . $row['content_file'] . '" type="video/mp4">
                                      Your browser does not support the video tag.
                                      </video>';
                            } elseif ($row['content_type'] == 'mp3') {
                                echo '<audio controls>
                                        <source src="uploads/' . $row['content_file'] . '" type="audio/mpeg">
                                      Your browser does not support the audio tag.
                                      </audio>';
                            } elseif ($row['content_type'] == 'pdf') {
                                echo '<embed src="uploads/' . $row['content_file'] . '" type="application/pdf" width="100%" height="200px"/>';
                            } else {
                                echo '<p>Text Content: ' . htmlspecialchars($row['content_file']) . '</p>'; 
                            }
                            
                            // Uploader info
                            echo '<p>Uploader : ' . htmlspecialchars($row['student_name']) . '</p>';
                            echo '<p>Id : ' . htmlspecialchars($row['student_id']) . '</p>';
                            echo '<button class="btn btn-primary" data-id="' . $row['id'] . '" data-title="' . htmlspecialchars($row['title']) . '" data-uploader="' . htmlspecialchars($row['student_name']) . '">More</button>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No content found.</p>';
                    }
                    ?>
                </div>
            </section>
        </div>
    </div>

    <!-- The Modal (Popup) -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modalTitle"></p><br><br>
            <p><b id="modalUploader"></b></p>
        </div>
    </div>

    <script>
    const moreButtons = document.querySelectorAll('.btn.btn-primary'); 
    const modal = document.getElementById('myModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalUploader = document.getElementById('modalUploader');
    const closeModal = document.getElementsByClassName("close")[0];

    moreButtons.forEach(button => {
        button.addEventListener('click', function() {
            modal.style.display = "block";
            modalTitle.textContent = "Description: " + this.getAttribute('data-title');
            modalUploader.textContent = "Uploader: " + this.getAttribute('data-uploader');
        });
    });

    // Close Modal
    closeModal.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

    <script src="main.js"></script>
</body>
</html>