<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Judge</title>
    <link rel="stylesheet" href="admin_control_8.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        h1 {
            margin-top: 40px;
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
            background-color: #F68B1F;
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

        /* Center the image */
        .admin-image-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .admin-image-container img {
            width: 300px;
            height: auto;
            border-radius: 50%; /* Optional: to make it round */
        }
    </style>
</head>
<body>
    <div style="width: 100%; height: 1vh; background-color: #F68B1F;"></div>

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

                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div>
       
        <!-- Image container to center the image -->
        <div class="admin-image-container">
            <img src="Images/admin1.png" alt="Admin Image">
        </div>
         <h1> Welcome To Admin </h1>
        
    </div>
</body>
</html>
