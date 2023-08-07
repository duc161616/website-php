<?php
include("../include/url_users.php");

/* If already logged in then redirect to previous page */
if(isset($_SESSION['username'])) {
		header('Location:../index.php');
}

if(isset($_POST['submit'])) {

	$username=$_POST['username'];
	$firstname=$_POST['firstname'];
	$emailid=$_POST['emailid'];
	$password=$_POST['password'];

	include("../db/dbconnect.php");

	/* CHECK if same user or email exists or not ? */
	$query="SELECT * FROM users , users WHERE username='$username' OR emailid='$emailid' ";
	$result=mysqli_query($conn , $query);
	$rows=mysqli_num_rows($result);

	if($rows > 0) {
		header("location:register.php");
	}
	else {
		$query="INSERT INTO users (username, firstname, password, emailid, star)
				VALUES ('$username','$firstname','$password','$emailid', 100)";
		mysqli_query($conn , $query);
		header("location:../index.php");
	}


}

?>

<div class="container">

<form class="form-horizontal col-sm-offset-2" role="form" action="register.php" method="post" >

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">User name </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="username" placeholder="" name="username">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">First Name </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">E mail </label>
    <div class="col-sm-5">
      <input type="email" class="form-control" id="email" placeholder="" name="emailid">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="pwd" placeholder="" name="password">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-5">
      <button type="submit" class="btn btn-default" name="submit">Register</button>
    </div>
  </div>


</form>

</div>