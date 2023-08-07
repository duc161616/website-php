<?php

include("../include/url_posts.php");


/* If not logged in then redirect to login page */
if(!isset($_SESSION['username']))
{
	header("location:../users/login.php");
}

if(isset($_POST['submit'])) {

	$postTitle=$_POST['postTitle'];
	$postDesc=$_POST['postDesc'];
	$postTag=$_POST['postTag'];
	$postAuthor=$_SESSION['username'];

	include("../db/dbconnect.php");

	/* CHECK if same user or email exists or not ? */
	$query="INSERT INTO posts (postTitle , postDesc , postTag , postAuthor)
			VALUES ('$postTitle' , '$postDesc' , '$postTag' , '$postAuthor') ";
	mysqli_query($conn , $query);

	printf("Successfully posted your post\n");
	header("location:posts.php");

}

/* * * * * POST Form * * * * */
else {

}

?>

<head>
	  	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	  	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<div class="container">
	<div class="row">
	<div class="panel panel-default">
			    <div class="panel-heading">New Post</div>
			    <div class="panel-body">

			     <!-- FORM STARTS HERE --> 
			      <form role="form" method="POST" action="newpost.php">
					  <div class="form-group">
					    <label class="control-label">Title</label>
					    <input type="text" class="form-control" name="postTitle" >
					  </div>

					  <div class="form-group">
  						<label for="Description">Description : </label>
  						<textarea class="form-control" rows="8" id="content" name="postDesc"></textarea>				
					  </div>

					  <div class="form-group">
					    <label class="control-label">Tag</label>
					    <input type="text" class="form-control" name="postTag"  >
					  </div>

				  	   <button type="submit" class="btn btn-default" name="submit">
				  	   		Publish 
				  	   	</button>
				</form>

				<!-- FORM ENDS HERE -->

			    </div>
			  </div>
			</div>
	</div>
</div>