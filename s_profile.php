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
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
</head>
<body>

     <?php
          require_once "database.php";
          $studentid = $_SESSION['sstudentid'];
          $sql = "SELECT * FROM s_users WHERE studentid = '$studentid'";
          $sql_run = mysqli_query($conn,$sql);
          foreach ($sql_run as $row) {
      ?>

		<div class="row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg">
			<div class="col-md-4 text-center">
				<img src="<?php echo "uploads/".$row["image"] ?>" class="img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
				<div>

						<a href="s_profile_edit.php">
							<button class="mx-auto m-1 btn-sm btn btn-primary">Edit</button>
						</a>
						<a href="logout.php">
							<button class="mx-auto m-1 btn-sm btn btn-info text-white">Logout</button>
						</a>
            <a href="s_home.php">
							<button class="mx-auto m-1 btn-sm btn btn-info text-success">Home</button>
						</a>
				</div>
			</div>
			<div class="col-md-8">
				<div class="h2">User Profile</div>
				<table class="table table-hover">
					<tr><th colspan="2">User Details:</th></tr>
					<tr><th><i class="bi bi-person-circle"></i> Name</th><td><?php echo $row['name']; ?></td></tr>
					<tr><th><i class="bi bi-pen"></i> Student ID</th><td> <?php echo $row["studentid"]; ?></td></tr>
					<tr><th><i class="bi bi-envelope"></i> Email</th><td> <?php echo $row["email"]; ?> </td></tr>
          <tr><th><i class="bi bi-envelope"></i> CGPA</th><td> <?php echo $row["cgpa"]; ?> </td></tr>
          <tr><th><i class="bi bi-envelope"></i> Completed Credit</th><td> <?php echo $row["c_credit"]; ?> </td></tr>
          <tr><th><i class="bi bi-envelope"></i> Department</th><td> <?php echo $row["department"]; ?> </td></tr>
					<tr><th><i class="bi bi-gender-ambiguous"></i> Gender</th><td> <?php echo $row["gender"]; ?> </td></tr>
					<tr><th><i class="bi bi-link"></i> Website</th><td><a href="<?php echo $row["website"]; ?>"><?php echo $row["website"]; ?></a></td></tr>
					<tr><th><i class="bi bi-github"></i> Github</th><td><a href="<?php echo $row["github"]; ?>"><?php echo $row["github"]; ?></a></td></tr>
					<tr><th><i class="bi bi-facebook"></i> Facebook</th><td><a href="<?php echo $row["facebook"]; ?>"><?php echo $row["facebook"]; ?></a></td></tr>
					<tr><th><i class="bi bi-linkedin"></i> Linkedin</th><td><a href="<?php echo $row["linkedin"]; ?>"><?php echo $row["linkedin"]; ?></a></td></tr>
				</table>
			</div>
		</div>
  <?php } ?>
</body>
</html>
