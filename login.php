<?php
session_start();
$conn=mysqli_connect("localhost","akhil","akhil123","chocolate_room");
if(isset($_POST['login_btn']))
{
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$password=md5($password);
	$sql="Select * from user where name='$username' and password='$password'";
	$run=mysqli_query($conn,$sql);
	if(mysqli_num_rows($run)==1)
	{
		$rows=mysqli_fetch_assoc($run);
		$_SESSION['message']="You are logged in";
		$date = date('d-m-Y h:i:s');
		$rand_num=mt_rand();
		$_SESSION['username']=$username;
		$_SESSION['user_id']=$rows['user_id'];
		$_SESSION['ref']=$date."_".$rand_num;
		header("location:home.php");
		
	}
	else{
		$_SESSION['message']=" The username / password incorrect";
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Chocolates</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
		<?php include 'includes/header.php'; 
		if(isset($_SESSION['message'])){
	       echo "<div id='error_msg'>$_SESSION[message]</div>";
	       unset($_SESSION['message']);
         }
		?>
<form method="post" class="col-md-offset-4 col-md-4">
<div><b> LOG IN</b> </div>
<br>
<div class="form-group">
<label for="name">Name</label>
<input type="text" id="name"  name="username" class="form-control">
</div>
<br>
<div class="form-group">
<label for="password">Password</label>
<input type="password" id="password" name="password" class="form-control">
</div>
<br>
<div class="form-group">
<input type="submit" class="form-control btn-success" value="Submit" name="login_btn">
</div>
</form>
<br><br><br>
		<div class="col-md-offset-4 col-md-4">
		<b> New User ? </b><a href="register.php"> Register here</a></div>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>