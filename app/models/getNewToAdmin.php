
<?php

// Require Database Connection
require '../config/connectdb.php';

// SQL Query to select articles, ordered by _date in descending order
$sql = "SELECT * FROM `articles` ORDER BY `_date` DESC";

// Prepare and execute the SQL query
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all results as an associative array
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return JSON response with the status, message, and data (articles)
echo json_encode([
    'status' => true,
    'message' => 'Articles récupérés avec succès',
    'data' => $result,
]);
?>
