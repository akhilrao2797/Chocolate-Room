<html>
<head>
<title>Product detail</title>

<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<style>
.btn {
font-size: 40px;
height: 70px;
}
</style>
</head>
<body>
<?php 
session_start();
include 'includes/header.php';	
?>
<div class="container">

<?php

if(isset($_GET['id']))
{$conn=mysqli_connect("localhost","akhil","akhil123","chocolate_room");
$sql="Select * from items where item_id='$_GET[id]'";
$run=mysqli_query($conn,$sql);
while($rows=mysqli_fetch_assoc($run)){
$item_id=$rows['item_id'];

echo"
<div class='col-md-8'>
<h3 class='pp-title'>$rows[item_name]</h3>
<img src='/$rows[item_img]' alt='$rows[item_name]' class='img-responsive'>
<br>
<h4 class='pp-desc-head'>Description</h4>
<br>
<div class='pp-desc-detail'>$rows[item_desc]</div><br><br>
";

}
}
?>	

<a href='buy.php?item_id=<?php echo $item_id;?>' class='btn btn-success btn-lg btn-block'>Buy</a>



<br><br><br><br><br>
<?php include 'includes/footer.php'; ?>
</div>
</body>
</html>