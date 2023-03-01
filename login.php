<?php
		
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Include file which makes the
	// Database Connection.
	include 'forumconnect.php';

	$username = $_POST["username"];
	$password = $_POST["password"];
			
	
	$sql = "Select username from Users where username='$username' AND password ='$password'";
	$result = pg_query($conn, $sql);
    //$row = pg_fetch_array($result,PGSQL_ASSOC);
	//$active = $row['active'];
	$num = pg_num_rows($result);
	
	// or not in our Database
	if($num == 1) {
	
			$_SESSION['username'] = $username;
           // echo  'Welcome ' . $_SESSION['username'] . '!';
            header("Location: class.php");
	
	}// end if
    else {
        echo 'Your Login Name or Password is invalid';
     }

	
}//end if
	
?>
	
<!doctype html>
	
<html lang="en">

<head>
	
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1,
		shrink-to-fit=no">
	
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./CSS/signin.css">
</head>
	
<body>

	
<div class="signupform">
<div class="wrapper">
	
	<form class="form" action="login.php" method="post">
    <h1 class="title">Login Here</h1>    
	
		
	
		<div class="inputContainer">
		<input type="text" class="input" id="username"
			name="username" placeholder ="a">	
            <label for="username" class="label">Username</label>
		</div>

		<div class="inputContainer">
			<input type="password" class="input"
			id="password" name="password" placeholder ="a">
            <label for="password" class="label">Password</label>
		</div>
		
	
		<button type="submit" class="submitBtn">
		Login
		</button>
	</form>
</div>
</div>
	

</body>
</html>
