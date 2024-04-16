<?php

// Including the file that contains the database connection configuration
require '../config/connectdb.php';


// SQL query to select all records from the 'articles' table and order them by the '_date' column in descending order
$sql = "SELECT * FROM `articles` ORDER BY `_date` DESC";

// Preparing the SQL statement
$stmt = $pdo->prepare($sql);

// Executing the prepared statement
$stmt->execute();

// Fetching all the resulting rows as an associative array
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Encoding the result as JSON and outputting it
echo json_encode([
    'status' => true,
    'message' => 'Comment retrieved successfully',
    'data' => $result,
]);
