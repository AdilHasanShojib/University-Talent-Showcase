
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
            $faculty_name = $_POST["faculty_name"];
            $designation = $_POST["designation"];
            $department = $_POST["department"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();

            if (empty($faculty_name) OR empty($designation) OR empty($department) OR empty($email) OR empty($password)) {
                array_push($errors, "All fields are required");
            }

            require_once "database.php";
            $sql = "SELECT * FROM faculties WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
                array_push($errors, "User already exists!");
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                // Insert new faculty user
                $sql = "INSERT INTO faculties (faculty_name, designation, department, email, password) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "sssss", $faculty_name, $designation, $department, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    $_SESSION["fuser"] = "success";
                    $_SESSION["fname"] = $faculty_name;
                    $_SESSION["fdesignation"] = $designation;
                    $_SESSION["fdepartment"] = $department;
                    $_SESSION["femail"] = $email;
                    header("Location: f_home.php");
                } else {
                    die("Incorrect Information!");
                }
            }
        }
        ?>
        <div class="login-box">
            <div class="logo" align="center">
                <img src="uploads/logouiu.png" height="90px" width="90px" alt="Logo">
            </div>
            <form action="f_signup.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="faculty_name" placeholder="Full Name">
                </div>
                <div class="form-control">
                    <select name="designation" class="form-select form-select mb-3" aria-label="Designation">
                        <option value="">Select Designation</option>
                        <option value="Professor">Professor</option>
                        <option value="Lecturer">Lecturer</option>
                        <option value="Assistant Professor">Assistant Professor</option>
                    </select>
                </div>
                <div class="form-control">
                    <select name="department" class="form-select form-select mb-3" aria-label="Department">
                        <option value="">Select Department</option>
                        <option value="CSE">CSE</option>
                        <option value="EEE">EEE</option>
                        <option value="BBA">BBA</option>
                        <!-- Add other departments as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-btn">
                    <input type="submit" class="btn btn-primary" value="Register" name="submit">
                    <p>Already Registered? <a href="f_login.php">Login Here</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
