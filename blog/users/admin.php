<?php

include("../include/url_users.php");

if(!isset($_SESSION['username'])){
	header('Location:../index.php');
}
else if($_SESSION['usertype']!='admin') {
  header('Location:../index.php');
}
else {
	$user=$_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Admin Panel</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#user">User List</a></li>
    <li><a data-toggle="tab" href="#posts">Private List</a></li>
    <li><a data-toggle="tab" href="#history">Transaction History</a></li>
  </ul>


  <div class="tab-content">

    <div id="user" class="tab-pane fade in active">
      <h3>User List</h3>
      <?php
         include("userlist.php");
      ?>
    </div>

    <div id="posts" class="tab-pane fade">
      <h3>Private List</h3>
      <?php
        include("../posts/posts_private.php");
      ?>
    </div>

    <div id="history" class="tab-pane fade">
      <h3>Transaction History</h3>
      <?php
        include("../users/transaction_history.php");
      ?>
    </div>

  </div>
</div>

</body>
</html>
