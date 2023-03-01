<?php
	
$showAlert = false;
$showError = false;
$exists=false;
	
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
	include 'forumconnect.php';
	
	$role = $_POST["role"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	
	
	
	$sql = "Select * from Users where username='$username'";
	
	$result = pg_query($conn, $sql);
	
	$num = pg_num_rows($result);
	
	// check if the username is already present
	// or not in our Database
	if($num == 0) {
		if($exists==false) {
	
			$hash = password_hash($password,
								PASSWORD_DEFAULT);
			
			if(strcasecmp($role,"student")==0)
			{
				$permissionID = 0;
				$error =0;
			}	
			else if (strcasecmp($role,"professor")==0)
			{
				$permissionID = 1;
				$error =0;
			}
			else if (strcasecmp($role,"ta")==0)
			{
				$permissionID = 2;
				$error =0;
			}
			else
			{	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Invalid Role!</strong> Valid Roles are: Student, Professor, TA.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			  </div> ';
			  $error =1;
			}
			if($error ==0)
			{// Password Hashing is used here.
				echo '$permissionID';
			$sql = "INSERT INTO Users (username, password, email, role, permissionid)
					VALUES ('$username', '$password', '$email','$role', $permissionID)";
	
			$result = pg_query($conn, $sql);
			header("Location: login.php");
				
			if ($result) {
				$showAlert = true;
			}
			}
            
		}
	
	}// end if
	
if($num>0)
{
	$exists="Username not available";
}
	
}//end if
	
?>
	
<!DOCTYPE html>
<html lang="en">

<head>
	
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1,
		shrink-to-fit=no">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	 <title>SignUp Form</title>
	<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./CSS/signin.css">
</head>
	
<body>
<div class="signupform">
	<div class="wrapper">
	<form class="form" action="signup.php" method="post">
	<h1 class="title">Learning Management System</h1>
	<h2 class="subtitle">Sign Up</h2>
		<div class="inputContainer">
		<input type="text" class="input" id="role"
			name="role" placeholder ="a">	
			<label for="role" class="label">Role</label>
		</div>

		<div class="inputContainer">
		<input type="text" class="input" id="username"
			name="username" placeholder ="a">	
			<label for="username" class="label">Username</label>
		</div>
	

        <div class="inputContainer">
			<input type="email" class="input"
			id="email" name="email" placeholder ="a">
			<label for="email" class="label">Email</label>
		</div>
		
		<div class="inputContainer">
			<input type="password" class="input"
			id="password" name="password" placeholder ="a">
			<label for="password" class="label">Password</label>
		</div>
		
	
		<button type="submit" class="submitBtn">
		SignUp
		</button>
		
		<p class="already" style= "text-align: center; margin-top:3px; color: gray;">Already have an account?<a href="login.php" style = "text-decoration: none"> Login</a></p>

	</form>
	</div>
</div>

<div>
<svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
<defs>
<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
</defs>
<g class="parallax">
<use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
<use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(23,96,96,0.5)" />
<use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(23,96,96,0.3)" />
<use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
</g>
</svg>
</div>

</body>
</html>
