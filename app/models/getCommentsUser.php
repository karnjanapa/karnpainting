<?php

// Including the file that connects to the database
require '../config/connectdb.php';



// SQL query to select all comments from the 'comments' table for a specific user, ordered by the '_date' column in descending order.
$sql = "SELECT * FROM `comments` WHERE user_id = :user_id ORDER BY `_date` DESC";

// Preparing the SQL statement
$stmt = $pdo->prepare($sql);

// Executing the prepared statement with the user_id parameter provided from the session.
$stmt->execute([
    ':user_id' => $_SESSION['user_id']
]);

// Fetching all the results into an associative array
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Returning a JSON response with status true, a success message, and the fetched data (comments for the user).
echo json_encode([
    'status' => true,
    'message' => 'Comments fetched successfully',
    'data' => $result,
]);
