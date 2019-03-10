<?php
session_start();
$conn=mysqli_connect("localhost","akhil","akhil123","chocolate_room");
if(isset($_REQUEST['chk_del_id']))
{
$chk_del_sql="Delete from checkout where chk_id = '$_REQUEST[chk_del_id]'";
$chk_del_run=mysqli_query($conn,$chk_del_sql);

}
if(isset($_REQUEST['chk_qty']))
{
$chk_qty_sql="Update checkout set chk_qty ='$_REQUEST[chk_qty]' where chk_id='$_REQUEST[up_chk_id]'";
$chk_qty_run=mysqli_query($conn,$chk_qty_sql);

}

echo "<table class='table'>
<thead>
<tr>
<th>S.no</th>
<th>Item</th>
<th>Quantity</th>
<th class='text-right'>Price</th>
<th class='text-right'>Total</th>
<th width='5%'>Delete</th>
</tr>
</thead>
<tbody>";

$chk_sel_sql="Select distinct * from checkout c join items i on c.chk_item=i.item_id where c.chk_ref='$_SESSION[ref]'";
$chk_sel_run=mysqli_query($conn,$chk_sel_sql);
$a=1;
$total=0;
while($chk_sel_rows=mysqli_fetch_assoc($chk_sel_run))
{
$total_price_item=$chk_sel_rows['item_price']*$chk_sel_rows['chk_qty']/100;
$total+=$total_price_item;

echo"
<tr>
<td>$a</td>
<td>$chk_sel_rows[item_name]</td>" ?>
<td><input type='number' style='width:50px;' min='100' value='<?php echo $chk_sel_rows['chk_qty'];?>' onblur="up_chk_qty(this.value,'<?php echo $chk_sel_rows['chk_id'];?>');"><b>gms</b></td>
<?php echo"<td class='text-right'><b>$chk_sel_rows[item_price]</b></td>
<td class='text-right'>$total_price_item<b></b></td>";?>
<td><button class='btn btn-danger btn-sm' onclick="del_func(<?php echo $chk_sel_rows['chk_id']?>);">Delete</button></td> 
<?php echo"
</tr>";
$a++;
}
$_SESSION['total_items']=$a-1;			
$_SESSION['total_price']=$total;
echo "</tbody>
</table>
<table class='table'>
<thead>
<tr>
<th class='text-center' colspan='2'>Order Summary</th>
</tr>
</thead>
<tbody>
<tr>
<td>Subtotal</td>
<td class='text-right'><b>$_SESSION[total_price]</b></td>
</tr>
<tr>
<td>Delivery Charges</td>
<td class='text-right'><b>Free</b></td>
</tr>
<tr>
<td>Grand Total</td>
<td class='text-right'><b>$_SESSION[total_price]</b></td>
</tr>
</tbody>";
?>