<?php

include("../include/url_users.php");

session_destroy();

printf("Successfully logged out");

/* Redirect to current page */
header("location:../index.php");

?>
