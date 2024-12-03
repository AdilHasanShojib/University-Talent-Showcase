<?php
    session_start();
    if(!isset($_SESSION['suser'])){
      session_destroy();
      header('Location: s_login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
</head>
<body>
	<?php
		require_once "database.php";
		$studentid = $_SESSION['sstudentid'];

		// Handle form submission
		if(isset($_POST['save'])){
			$name = $_POST['name'];
			if(empty($name)){
				$name = $_SESSION['sname'];
			}
			$email = $_POST['email'];
			if(empty($email)){
				$email = $_SESSION['semail'];
			}
			$gender = $_POST['gender'];
			if(empty($gender)){
				$gender = $_SESSION['sgender'];
			}
			$website = $_POST['website'];
			if(empty($website)){
				$website = $_SESSION['swebsite'];
			}
			$github = $_POST['github'];
			if(empty($github)){
				$github = $_SESSION['sgithub'];
			}
			$facebook = $_POST['facebook'];
			if(empty($facebook)){
				$facebook = $_SESSION['sfacebook'];
			}
			$linkedin = $_POST['linkedin'];
			if(empty($linkedin)){
				$linkedin = $_SESSION['slinkedin'];
			}
			$department = $_POST['department'];
			if(empty($department)){
				$department = $_SESSION['sdepartment'];
			}
			$cgpa = $_POST['cgpa'];
			if(empty($cgpa)){
				$cgpa = $_SESSION['scgpa'];
			}
			$c_credit = $_POST['c_credit'];
			if(empty($c_credit)){
				$c_credit = $_SESSION['sc_credit'];
			}
			
			// Image Upload
			$image = $_FILES['image']['name'];
			if(!empty($image)){
				move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
			} else {
				$image = $_SESSION['simage'];
			}
			
			// Update query
			$query = "UPDATE s_users SET name = '$name', email = '$email', gender = '$gender', website = '$website',
						github = '$github', facebook = '$facebook', linkedin = '$linkedin', image = '$image', 
						department = '$department', cgpa = '$cgpa', c_credit = '$c_credit' WHERE studentid = $studentid";
			$result = mysqli_query($conn, $query);

			// Update session variables
			$_SESSION["sname"] = $name;
			$_SESSION["semail"] = $email;
			$_SESSION["sgender"] = $gender;
			$_SESSION["swebsite"] = $website;
			$_SESSION["sgithub"] = $github;
			$_SESSION["sfacebook"] = $facebook;
			$_SESSION["slinkedin"] = $linkedin;
			$_SESSION["simage"] = $image;

			// Success message
			echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Congratulations!</strong> Profile Updated Successfully.
				  </div>';
		}

		// Fetch current user data
		$ok = "SELECT * FROM s_users WHERE studentid = $studentid";
		$res = mysqli_query($conn, $ok);
		foreach ($res as $row) {
	?>
		<div class="row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg">
			<div class="col-md-8">
				<div class="h2">Edit Profile</div>
				<form action="s_profile_edit.php" method="POST" enctype="multipart/form-data">
					<div class="col-md-4 text-center">
						<!-- Image Display -->
						<img src="uploads/<?php echo !empty($row['image']) ? $row['image'] : 'default.png'; ?>" 
							 class="js-image img-fluid rounded" 
							 style="width: 180px; height: 180px; object-fit: cover;">
						<div>
							<div class="mb-3">
								<label for="formFile" class="form-label">Click below to select an image</label>
								<input type="file" name="image" class="form-control">
							</div>
						</div>
					</div>

					<table class="table table-hover">
						<!-- Other form fields for user details -->
						<tr><th colspan="2">User Details:</th></tr>
						<tr><th><i class="bi bi-person-circle"></i> Full Name</th>
							<td><input value="<?php echo $row['name']; ?>" type="text" name="name" class="form-control" placeholder="Enter name"></td>
						</tr>
						<tr><th><i class="bi bi-envelope"></i> Email</th>
							<td><input value="<?php echo $row['email']; ?>" type="text" name="email" class="form-control" placeholder="Enter email"></td>
						</tr>
						<tr><th><i class="bi bi-envelope"></i> CGPA</th>
							<td><input value="<?php echo $row['cgpa']; ?>" type="text" name="cgpa" class="form-control" placeholder="Enter CGPA"></td>
						</tr>
						<tr><th><i class="bi bi-envelope"></i> Completed Credit</th>
							<td><input value="<?php echo $row['c_credit']; ?>" type="text" name="c_credit" class="form-control" placeholder="Enter Completed Credit"></td>
						</tr>
						<tr><th><i class="bi bi-gender-ambiguous"></i> Department</th>
							<td>
								<select name="department" class="form-select form-select mb-3">
									<option value="">Select Department</option>
									<option value="Computer Science And Engineering" <?php echo ($row['department'] == 'Computer Science And Engineering') ? 'selected' : ''; ?>>CSE</option>
									<option value="Electrical And Electronics Engineering" <?php echo ($row['department'] == 'Electrical And Electronics Engineering') ? 'selected' : ''; ?>>EEE</option>
									<option value="Civil Engineering" <?php echo ($row['department'] == 'Civil Engineering') ? 'selected' : ''; ?>>CE</option>
								</select>
							</td>
						</tr>
						<tr><th><i class="bi bi-gender-ambiguous"></i> Gender</th>
							<td>
								<select name="gender" class="form-select form-select mb-3">
									<option value="">Select Gender</option>
									<option value="Female" <?php echo ($row['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
									<option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
								</select>
							</td>
						</tr>
						<tr><th><i class="bi bi-link"></i> Website</th>
							<td><input value="<?php echo $row['website']; ?>" type="text" name="website" class="form-control" placeholder="Enter website link"></td>
						</tr>
						<tr><th><i class="bi bi-github"></i> Github</th>
							<td><input value="<?php echo $row['github']; ?>" type="text" name="github" class="form-control" placeholder="Enter github link"></td>
						</tr>
						<tr><th><i class="bi bi-facebook"></i> Facebook</th>
							<td><input value="<?php echo $row['facebook']; ?>" type="text" name="facebook" class="form-control" placeholder="Enter facebook link"></td>
						</tr>
						<tr><th><i class="bi bi-linkedin"></i> Linkedin</th>
							<td><input value="<?php echo $row['linkedin']; ?>" type="text" name="linkedin" class="form-control" placeholder="Enter linkedin link"></td>
						</tr>
					</table>

					<div class="p-2">
						<button name="save" type="submit" class="btn btn-primary float-end">Save</button>
						<a href="s_profile.php" class="btn btn-secondary">Back</a>
					</div>
				</form>
			</div>
		</div>
	<?php
		}
	?>
</body>
</html>
