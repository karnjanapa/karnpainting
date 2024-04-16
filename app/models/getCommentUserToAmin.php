<?php

// Including the file that connects to the database
require '../config/connectdb.php';


// SQL query to select all comments from the 'comments' table, ordered by the '_date' column in descending order.
$sql = "SELECT * FROM `comments` ORDER BY `_date` DESC";

// Preparing the SQL statement
$stmt = $pdo->prepare($sql);

// Executing the prepared statement
$stmt->execute();

// Fetching all the results into an associative array
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Returning a JSON response with status true, a success message, and the fetched data.
echo json_encode([
    'status' => true,
    'message' => 'Comments fetched successfully',
    'data' => $result,
]);
