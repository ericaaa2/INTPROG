<?php
session_start();
require 'db.php';

$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Check if username exists
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($user && password_verify($password, $user['password'])){
    $_SESSION['user'] = $user['username'];
    $_SESSION['user_email'] = $user['email'];
    header("Location: typing.php");
    exit();
} else {
    header("Location: login.php?msg=Invalid username or password!");
    exit();
}
?>
