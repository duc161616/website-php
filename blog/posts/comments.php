<?php
    /* fetch comments from db */
    $query = "SELECT * FROM comments WHERE postID='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<div class='panel-footer'>Comments</div>";
        if (mysqli_num_rows($result) > 0) {
            while ($comment = mysqli_fetch_assoc($result)) {
                echo "<div class='panel-footer'>";
                echo "<span>";
                echo "<a href='../users/profile.php?user=".$comment['commentAuthor']."'>".$comment['commentAuthor']."</a>";
                echo "<i>-</i>";
                echo $comment['commentDesc'];
                echo "</span>";
                echo "<span class='pull-right'><i>".$comment['commentTime']."</i></span>";
                echo "</div>";
            }
        }
    } else {
        echo "Query failed";
    }
?>