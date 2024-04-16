<?php

// Include the file that connects to the database
require 'app/config/connectdb.php';

// SQL query to delete a user from the '_user' table where user_id matches the parameter
$sql = "DELETE FROM _user WHERE user_id = :user_id";

// Prepare the SQL statement
$stmt = $pdo->prepare($sql);

// Execute the SQL statement with the provided parameters
$deleteUser = $stmt->execute([
    'user_id' => $_SESSION['user_id'] // Parameter value obtained from session data
]);

// Check if the deletion was successful
if ($deleteUser) {
    // If successful, destroy the session (logging out the user)
    session_destroy();
    // Redirect to the default page after successful deletion and logout
    header('Location: ./?action=default');
} else {
    // If deletion fails, redirect to the default page
    header('Location: ./?action=default');
}
