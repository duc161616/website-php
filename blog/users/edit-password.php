<?php

include("../include/url_users.php");

if(!isset($_REQUEST['user'])) {
	header("/posts/posts.php");
}

/* Update profile form */
if(!isset($_POST['submit'])) {

	include("../db/dbconnect.php");

	$user=$_REQUEST['user'];

	$query="SELECT * FROM users WHERE username='$user' ";
	$result=mysqli_query($conn , $query);


	if(mysqli_num_rows($result) > 0) {
		$profile=mysqli_fetch_assoc($result);

		/* Only Author can update the post */
		// if($_SESSION['username']  != $profile['username'] && $_SESSION['usertype']!='admin') {
        //     echo "<script>alert('you do not have permission to perform this function');document.location = 'profile.php';</script>";     	
		// }

		$id=$profile['id'];
		$username=$profile['username'];
		$firstname=$profile['firstname'];
		$email=$profile['emailid'];
        $password=$profile['password'];
		$type=$profile ['usertype'];

		include("../include/frame_edit_password.php");

	} else {
		echo "No such user exists";
	}
}
/* Update query */
else {
	include("../db/dbconnect.php");


	$user=$_REQUEST['user'];
    // $oldpassword=$_POST['oldpassword'];
	$newpassword=$_POST['newpassword'];


	$query="UPDATE users
			SET password='$newpassword'  
			WHERE username='$user';
			";

	$result=mysqli_query($conn , $query);

	if($result) {
		echo "Updated Successfully";
		header("location:profile.php?user=".$user);
	} else {
		echo "Updation failed";
		header("location:edit-password.php?user='$user' ");
	}

}

?>