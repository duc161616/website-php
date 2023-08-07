<?php
	include("bootstrap_cdn.php");
?>

<head>
	  	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	  	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<div class="container">
	<div class="row">
	<div class="panel panel-default">
			    <div class="panel-heading">Update Password</div>
			    <div class="panel-body">

			     <!-- FORM STARTS HERE -->
			      <form role="form" method="POST" action=<?php echo "edit-password.php?user=".$user ; ?>>
					  <!-- <div class="form-group">
					    <label class="control-label">Old Password</label>
					    <input type="" class="form-control" name="oldpassword" >
					  </div> -->

					  <div class="form-group">
  						<label for="password">New Password </label>
                          <input type="password" class="form-control" name="newpassword" >
					  </div>

				  	   <button type="submit" class="btn btn-default" name="submit">
				  	   	Update
				  	   </button>
				  </form>

				<!-- FORM ENDS HERE -->

			  </div>
	</div>
	</div>
</div>