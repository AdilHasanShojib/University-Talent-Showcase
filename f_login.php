<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'talent_showcase');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password']; // User-provided password

    // Check if the faculty exists in the database
    $query = "SELECT * FROM faculties WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch the faculty data
        $faculty = $result->fetch_assoc();
        
        // Compare the password in plain text
        if ($password == $faculty['password']) {
            // Set session variables
            $_SESSION['faculty_id'] = $faculty['id'];
            $_SESSION['faculty_name'] = $faculty['faculty_name'];
            $_SESSION['email'] = $faculty['email'];

            // Redirect to the dashboard or judge page
            header('Location: dashboard.php');
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('Invalid faculty email!');</script>";
    }
}
?>











 
        <div class="login-box">
            <div class="logo" align="center" >
                    <img src="uploads/logouiu.png" height="90px" widget="90px" alt="Logo">
            </div>
            <form action="f_login.php" method="post">
                <div class="form-group">
                    <input type="email" placeholder="Email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" name="password" class="form-control">
                </div>
                <div class="form-btn text-center">
                    <input type="submit" value="Login" name="login" class="btn btn-primary">
                    <p>Not registered yet? <a href="f_signup.php">Register Here</a></p>
                </div>
            </form>
        </div>   

    </div> 
</body>
</html>
