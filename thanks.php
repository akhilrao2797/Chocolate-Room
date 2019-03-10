<?php
	session_start();
	session_destroy();
	unset($_SESSION['username']);
	include 'includes/header.php';
?>
<html>
	<head>
		<title>Chocolates</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
<br><br><br>
<b class="col-md-offset-4 col-md-4"> Thanks For your purchasing...We would love to serve you.....You will be contacted by our customer care for confirmation...You are logged out now.</b>
<br><br><br>
	
<b class="col-md-offset-4 col-md-4"><a href="home.php"> Click here </a> to be redirected to the main page</b> 
</body>
</html>

<?php
	include 'includes/footer.php';
?>