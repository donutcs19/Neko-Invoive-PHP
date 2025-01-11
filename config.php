<?php

require_once './vendor/autoload.php';



// init configuration
$clientID = '920555356117-654voftn9j9r81kocl8jt6e986nc7mjg.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/invoice/callback.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// Connect to database
$hostname = "localhost";
$username = "shikikie";
$password = "ci8EMElAx4FI";
$database = "invoice";

// Connect to your database
try {
    $pdo = new PDO('mysql:host='. $hostname .';dbname='. $database, $username, $password);
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
