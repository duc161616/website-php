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
			    <div class="panel-heading">Give Star</div>
			    <div class="panel-body">

			     <!-- FORM STARTS HERE -->
			      <form role="form" method="POST" action=<?php echo "give_star.php?user=".$user ; ?>>
					  <div class="form-group">
					    <label class="control-label">Amount</label>
					    <input type="number" class="form-control" name="amount" required min="0" style="height: 40px";>
					  </div>

				  	   <button type="submit" class="btn btn-default" name="submit">
				  	   	Transfer
				  	   </button>
				  </form>

				<!-- FORM ENDS HERE -->

			  </div>
	</div>
	</div>
</div>