<?php
$index_url='index.php';
$posts_url='posts/posts.php';
$post_url='posts/post.php';
$newpublic_url='posts/newpost.php';
$newprivate_url='posts/new_private_post.php';
$login_url='users/login.php';
$logout_url='users/logout.php';
$register_url='users/register.php';

session_start();

include("include/navbar.php");
include("include/bootstrap_cdn.php");
header("location:posts/posts.php");
?>