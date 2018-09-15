<?php session_start(); ?>
<?php include('/include/dbcon.php'); ?>
<html>
<head>
<title>ACME PVT LTD</title>
<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body style="background:#e6e6e6;">
<?php include 'include/header.php';?>
<div class="form" style="background:white;">
  <form action="#" method="post">
	<center><h3>Login</h3></center>
	<div class="form-input">
		<input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
    </div>
    <div class="form-input">
		<input type="password" name="pass" required="required" placeholder="Password" required></input>
    </div>    
    <div class="button">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>
 <?php
	if (isset($_POST['login']))
	{
		$username = mysqli_real_escape_string($con, $_POST['user']);
		$password = mysqli_real_escape_string($con, $_POST['pass']);			
		$query = mysqli_query($con, "SELECT * FROM users WHERE  password='$password' and username='$username'");
		$row=mysqli_fetch_array($query);
		$num_row=mysqli_num_rows($query);
		if($num_row > 0) 
		{			
			$_SESSION['user_id']=$row['user_id'];
			header('location:dashboard.php');
		}
		else
		{
			echo 'Invalid Username and Password Combination';
		}
	}
 ?>
 </div>
 <?php include 'include/footer.php';?>
</body>
</html>