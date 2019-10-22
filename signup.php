<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","authentication");
if (isset($_POST['register_btn'])) {
	session_start();
	$fname=mysql_real_escape_string($_POST['fname']);
	$lname=mysql_real_escape_string($_POST['lname']);
	$email=mysql_real_escape_string($_POST['email']);
	$phone=mysql_real_escape_string($_POST['phone']);
	$password=mysql_real_escape_string($_POST['password']);
	$password2=mysql_real_escape_string($_POST['password2']);
	
	if ($password==$password2){
		//create user
		$password=md5($password);
		$sql="INSERT INTO users(fname,lname,email,phone,password) VALUES('$fname','$lname','$email','$phone','$password')";
		mysqli_query($db,$sql);
		$_SESSION['message']="You are logged in";
		$_SESSION['fname']=fname;
		header("location: home.php"); //redirect to home page
	}else{
		$_SESSION['message']="The two passwords do not match";
		$_SESSION['message']="The two passwords do not match";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration From</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" align="center" style="width: 300px">
  <h2 >Registration form</h2>
  <form method="POST" action="signup.php" >
    <div class="form-group">
      <input type="fname" class="form-control" id="fname" placeholder="First Name" name="fname">
    </div>
    <div class="form-group">
      <input type="lname" class="form-control" id="lname" placeholder="Last Name" name="lname">
	</div> 
	<div class="form-group">
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
	<div class="form-group">
      <input type="phone" class="form-control" id="phone" placeholder="Phone Number" name="email">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>  
	<div class="form-group">
      <input type="cpassword" class="form-control" id="password2" placeholder="Confirm password" name="password2">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
