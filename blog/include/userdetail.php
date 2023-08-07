<?php
$username=$_SESSION['username'];
?>

<ul class="nav navbar-nav">
		 <li>
			<a href="../posts/newpost.php" >
		 		<span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Public post	
			</a>
		 </li>
		<li>
			<a href="../posts/new_private_post.php" >
		 		<span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Private post	
			</a>
		</li>
        <li>
        	<a href=<?php  echo "/blog/users/profile.php?user=".$username; ?> >
        		Hello <?php echo "$username" ?>
        	</a>
        </li>

        <li>
        	<a href=<?php echo $logout_url ?> >
        		<span class="glyphicon glyphicon glyphicon-off" aria-hidden="true"></span> Logout
			</a>
        </li>
 </ul>