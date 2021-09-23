<?php
// Connection variable credentials

$host = 'localhost';
$user = 'root';
$pass = '';
$dbse = 'auth';

// Try and establish a connection with the database
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbse", $user, $pass);
} catch (PDOException $e) {
    // If we fail to connect, pass the error message back to the user
    die('Connection failed : ' . $e->getMessage());
}