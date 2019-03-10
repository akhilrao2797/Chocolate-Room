
<!DOCTYPE html>
<html>
<body>
<form action="" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>
    <label for="contact_no"><b>Contact Number</b></label>
    <input type="text" placeholder="Enter Contact Number" name="contact_no" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw_repeat" required>
   
    
  <!--  <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label> -->
    
  <!--  <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>-->

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit"  class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
<?php
$conn=mysqli_connect("localhost","akhil","akhil123","chocolate_room");
if(isset($_POST["name"])){
$name=$_POST["name"];
$contact_no=$_POST["contact_no"];
$password=$_POST["psw"];
$psw_repeat=$_POST["psw_repeat"];
}

if(!strcmp($password,$psw_repeat))
{
	$password=md5($password);
$sql="Insert into user(name,password,phone_no) values('$name','$password','$contact_no')";
mysql_query($conn,$sql);}
else
	echo"renter the password correctly";



?>

</body>
</html>
