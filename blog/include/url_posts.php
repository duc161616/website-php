<?php

/*
Stores URLs that will need to include in post folder's files
*/

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$index_url='../index.php';
$posts_url='posts.php';
$top_posts_url='../posts/topposts.php';
$post_url='post.php';
$newpublic_url='newpost.php';
$newprivate_url='new_private_post.php';
$login_url='../users/login.php';
$register_url='../users/register.php';
$logout_url='../users/logout.php';
$profile_url='../users/profile.php';
$search_url='../posts/search.php';
$contact_us_url='../users/contact_us.php';

include("../db/dbconnect.php");
include("../include/navbar.php");
include("../include/bootstrap_cdn.php");

?>
