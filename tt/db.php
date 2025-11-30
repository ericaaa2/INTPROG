<?php
$host = "localhost";      // or your MariaDB host
$dbname = "qwerty_quest"; // the database you just created
$user = "root";           // your MariaDB username
$pass = "";               // your MariaDB password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
