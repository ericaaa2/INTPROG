<?php
session_start();
require 'db.php'; // PDO connection to MariaDB

$new_username = trim($_POST['new_username']);
$new_password = trim($_POST['new_password']);

// Check if username exists
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$new_username]);
if($stmt->rowCount() > 0){
    header("Location: login.php?msg=Username already exists!");
    exit();
}

// Hash password
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// Insert into database
$email = $new_username . "@example.com";
$stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
$stmt->execute([$new_username, $hashed_password, $email]);

// Log in the user
$_SESSION['user'] = $new_username;
$_SESSION['user_email'] = $email;

// Redirect to typing page
header("Location: typing.php");
exit();
?>
