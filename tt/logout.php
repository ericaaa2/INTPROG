<?php
session_start();
$_SESSION = [];
session_destroy();
header("Location: login.php"); // goes directly to Log In / Sign Up
exit;
?>
