<!-- Đoạn mã này để xem post theo id,tags,user. Nếu  -->

<?php

include("../include/url_posts.php");
include_once("../include/algos.php");

	/* post.php?id=2 */
	if(isset($_REQUEST['id'])) {
		$id=$_REQUEST['id'];

		$query="SELECT * FROM post_private WHERE postID='$id'";
		$result=mysqli_query($conn , $query);

		if($post=mysqli_fetch_assoc($result)) {
				$id=$post['postID'];
				$title=$post['postTitle'];
				$desc=$post['postDesc'];
				$tags=$post['postTag'];
				$author=$post['postAuthor'];
				$time=$post['postTime'];
				$shortpost=0;
				/* increament view by 1 */
				$views=increament_views($id, $author);

				include("../include/frame_post.php");
		}
	}

		/* post.php?tags=dp */
	if(isset($_REQUEST['tags'])) {
		$tag=$_REQUEST['tags'];

		$query="SELECT * FROM post_private WHERE postTag='$tag'";
		$result=mysqli_query($conn , $query);

		if(mysqli_num_rows($result) > 0) {
			while($post=mysqli_fetch_assoc($result)) {
				$id=$post['postID'];
				$title=$post['postTitle'];
				$desc=$post['postDesc'];
				$tags=$post['postTag'];
				$author=$post['postAuthor'];
				$time=$post['postTime'];


				include("../include/frame_post.php");
			}

		}

	}

	/* post.php?user=qt */
if(isset($_REQUEST['user'])) {
	$user=$_REQUEST['user'];

	$query="SELECT * FROM post_private WHERE postAuthor='$user'";
	$result=mysqli_query($conn , $query);

	if(mysqli_num_rows($result) > 0) {
		while($post=mysqli_fetch_assoc($result)) {
			$id=$post['postID'];
			$title=$post['postTitle'];
			$desc=$post['postDesc'];
			$tags=$post['postTag'];
			$author=$post['postAuthor'];
			$time=$post['postTime'];
			$shortpost=0;  

			include("../include/frame_post.php");
		}

	}

}

?>
