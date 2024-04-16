<?php
// Start a session
session_start();

// Define database connection parameters
$host = 'localhost'; // Database host
$dbname = 'gretaxao_sommaika'; // Database name
$username = 'gretaxao_sommaika'; // Database username
$password = 'SommaiKa2023!'; // Database password

// Create a PDO object to connect to the database
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

try {
    // Set PDO attributes for error handling and prepared statements
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // Uncomment the line below for debugging purposes
    // echo "Connected to the database successfully";
} catch (PDOException $e) {
    // If connection fails, display an error message
    die("Connection failed: " . $e->getMessage());
}
