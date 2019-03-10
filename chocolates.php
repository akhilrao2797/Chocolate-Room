<?php 
$conn=mysqli_connect("localhost","akhil","akhil123","chocolate_room");
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
<?php session_start(); include 'includes/header.php'; ?>
<div class="container-fluid">
<div class="row">
<?php

$sql="Select * from items";
$run=mysqli_query($conn,$sql);
while($rows=mysqli_fetch_assoc($run))
{
$sql1="Select * from inventory where item_id='$rows[item_id]'";
$run1=mysqli_query($conn,$sql1);
while ($info=mysqli_fetch_assoc($run1))
    {
		if($info['item_qty']==0)
		{
			echo"
<div class='col-md-4'>
<div class='col-md-12  single-item noPadding'>
<div class='top'><img src='/$rows[item_img]'></div>
<div class='bottom'><b readonly>
<h3 class='item-title pull-left'><a>$rows[item_name]</a></h3></input>
<div class='item-title pull-right discounted-price'>Rs $rows[item_price]/-</div>
Out of Stock
<div class='clearfix'></div>
</div>
</div>
</div>";
		}
		else{
			
echo"
<div class='col-md-4'>
<div class='col-md-12  single-item noPadding'>
<div class='top'><img src='/$rows[item_img]'></div>
<div class='bottom'>
<h3 class='item-title pull-left'><a href='chocolate_item.php?id=$rows[item_id]'>$rows[item_name]</a></h3>
<div class='item-title pull-right discounted-price'>Rs $rows[item_price]/-</div>
<div class='clearfix'></div>
</div>
</div>
</div>";
	}}
}
?>
</div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>