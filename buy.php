<?php session_start();
$conn=mysqli_connect("localhost","akhil","akhil123","chocolate_room");
if(isset($_POST['order_submit']))
{
$name=mysqli_real_escape_string($conn,strip_tags($_POST['name']));
$email=mysqli_real_escape_string($conn,strip_tags($_POST['email']));
$contact=mysqli_real_escape_string($conn,strip_tags($_POST['contact']));
$address=mysqli_real_escape_string($conn,strip_tags($_POST['address']));
$state=mysqli_real_escape_string($conn,strip_tags($_POST['state']));
$order_ins_sql="Insert into orders_details(orders_name,orders_email,orders_contact,orders_delivery_address,orders_state,orders_checkout_ref,orders_total) values ('$name','$email','$contact','$address','$state','$_SESSION[ref]','$_SESSION[total_price]')";
mysqli_query($conn,$order_ins_sql);
$sql="Insert into shipped(user_id,total_items,total_price,transaction_id) values ('$_SESSION[user_id]','$_SESSION[total_items]','$_SESSION[total_price]','$_SESSION[ref]')";
$run=mysqli_query($conn,$sql);
header("location:thanks.php");
}
if(isset($_GET['item_id']))
{
if(isset($_SESSION['ref'])){}
else{
header("location:login.php");}
$buy_sql="Insert into checkout(chk_item,chk_ref) values ('$_GET[item_id]','$_SESSION[ref]')";
if(mysqli_query($conn,$buy_sql)){
?>
<script>
window.location="buy.php";
</script>
<?php
}
}
?>
<html>
<head>
<title>Chocolate Room</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script>
function ajax_func(){
xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState==4 && xmlhttp.status==200){
document.getElementById('get_process_data').innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open('GET','buy_process.php',true);
xmlhttp.send();

}

function del_func(chk_id){
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState==4 && xmlhttp.status==200){
document.getElementById('get_process_data').innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open('GET','buy_process.php?chk_del_id='+chk_id,true);
xmlhttp.send();	
}
function up_chk_qty(qty_value,chk_id){
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState==4 && xmlhttp.status==200){
document.getElementById('get_process_data').innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open('GET','buy_process.php?chk_qty='+qty_value+'&up_chk_id='+chk_id,true);
xmlhttp.send();	
}
</script>
</head>
<body onload="ajax_func();">
<?php include 'includes/header.php'; ?>
<div class="container">

<div class="page-header">
<h2 class="text-left">Checkout</h2><p class="text-right"> </div>

<div class="panel panel-default">
<div class="panel-heading">Order Detail</div>
<div class="panel-body">

	<div id="get_process_data"></div>
</div>
</div>

<button class="btn btn-success center col-md-offset-4 col-md-4" data-toggle="modal" data-target="#myModal" data-backdrop="static">Proceed</button>
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<div class="pull-left" >Details</div>
<div class="pull-right"><button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
</div>
<div class="modal-body">
<form method="POST">
<div class="form-group">
<label for="name">Name</label>
<input type="text" id="name" placeholder="Full Name" name="name" class="form-control" required>
</div>
<br>
<div class="form-group">
<label for="email">Email</label>
<input type="email" id="email" placeholder="Email" name="email" class="form-control" required>
</div>
<br>
<div class="form-group">
<label for="contact">Contact Number</label>
<input type="text" id="contact" placeholder="Contact Number"  name="contact" class="form-control" required>
</div>
<br>
<div class="form-group">
<label for="address">Delivery Address</label>
<textarea class="form-control" placeholder="Address"  name="address" id="address" required></textarea>
</div>
<br>
<div class="form-group">
<label for="state">State</label>
<input type="text" value="Karnataka" id="state" name="state" class="form-control" readonly>
</div>
<br>
<br>
<div class="form-group">
<input type="submit" name="order_submit" class="btn btn-danger btn-lg btn-block">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</form>
</div>
<br><br><br><br><br>
<?php include 'includes/footer.php'; ?>
</body>
</html>