<?php
session_start();
$conn=mysqli_connect("localhost","akhil","akhil123","chocolate_room");

if(isset($_POST['register_btn']))
{
$username=mysqli_real_escape_string($conn,$_POST['username']);
$contact=mysqli_real_escape_string($conn,$_POST['contact']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$repassword=mysqli_real_escape_string($conn,$_POST['repassword']);
if($username!=Null)
{
$sql="Select * from user where name='$username'";
$run=mysqli_query($conn,$sql);
if(mysqli_num_rows($run)==0)
{
if($password==$repassword)
{
$password=md5($password);
$sql="Insert into user(name,password,phone_no) values('$username','$password','$contact')";
$run=mysqli_query($conn,$sql);
header("location:home.php");
}
else{
$_SESSION['message']="The two passwords dont match";
}
}
else{
$_SESSION['message']="The username already exists";
}
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Chocolate store</title>

<link rel="stylesheet" href="css/font-awesome.css">
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
<div><b> REGISTER  HERE </b> </div>
<br>
<div class="form-group">
<label for="name">UserName</label>
<input type="text" id="name"  name="username" class="form-control" required>
</div>
<br>
<div class="form-group">
<label for="password">Password</label>
<input type="password" id="password" name="password" class="form-control" required>
</div>
<br>
<div class="form-group">
<label for="repassword">Re-enter Password</label>
<input type="password" id="repassword" name="repassword" class="form-control" required>
</div>
<br>
<div class="form-group">
<label for="contact">Contact Number</label>
<input type="text" id="contact" name="contact" class="form-control" required>
</div>
<br>
<div class="form-group">
<input type="submit" class="form-control btn-success" value="Submit" name="register_btn">
</div>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include 'includes/footer.php'; ?>
</body>
</html>