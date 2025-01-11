<?php

$hostname = "localhost";
$username = "shikikie";
$password = "ci8EMElAx4FI";
$database = "invoice";

try {
    $pdo = new PDO('mysql:host='. $hostname .';dbname='. $database, $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>