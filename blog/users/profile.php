<?php

include("../include/url_users.php");

if(!isset($_REQUEST['user'])) {
	header('Location:../index.php');
	exit; 
} else {
	$user = $_REQUEST['user'];
}

/* fetch user detail */
$query = "SELECT *
		  FROM users
		  WHERE username='$user'";

$result = mysqli_query($conn , $query);

if($result) {
	if(mysqli_num_rows($result) == 1) {
		while($row = mysqli_fetch_assoc($result)) {
			if($row['usertype'] == 'admin') {
				header("location:admin.php");
				exit;
			}
			include("../include/frame_profile_detail.php");
		}
	} else {
		echo "<script>alert('User not exist')</script>";
		echo "<p>User not exist. Redirecting to index page...</p>";
		header('refresh:3;url=../index.php'); // Chuyển hướng sau 5 giây
	}
} else {
	echo "Failed";
}

?>
