<?php
session_start();
$conn=mysqli_connect("localhost","akhil","akhil123","chocolate_room");
if(isset($_POST['inv_btn']))
{
	$name=$_POST['item'];
	$value=$_POST['value'];
	$sql="Update inventory set item_qty='$value' where item_id='$name' ";
$run=mysqli_query($conn,$sql);
}
?>


<!Doctype html>
<html>
	<head>
		<title>Chocolate room ADMIN PANEL</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
	<?php include 'includes/header.php';
?>
<h2 class="col-md-offset-4 col-md-4">INVENTORY</h2>
<form method="post" class="col-md-offset-4 col-md-4">
<br>
<div class="form-group">
<label for="password">ITEM</label><br>
<select name="item" class="form-group">
<?php 
$conn=mysqli_connect("localhost","akhil","akhil123","chocolate_room");
$sql="Select * from inventory";
$run=mysqli_query($conn,$sql);
while($rows=mysqli_fetch_assoc($run)){
echo "<option value=\"owner1\">" . $rows['item_id'] . "</option>";
}

?>
</select>
</div>
<div class="form-group">
<label >New value</label>
<input type="text" name="value" class="form-control">
</div>
<br>
<div class="form-group">
<input type="submit" class="form-control btn-success" value="Submit" name="inv_btn">
</div>
</form>
		
			
		
	</body>
</html>