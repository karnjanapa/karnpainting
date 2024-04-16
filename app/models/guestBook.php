<?php
// Including the database connection file
require '../config/connectdb.php';


// Check if the 'Comments' parameter is set in the POST request
if (isset($_POST['Comments'])) {
    // Retrieve the comment from the POST data
    $comment = htmlspecialchars($_POST['Comments']);

    // Check if the comment is empty
    if (empty($comment)) {
        // If the comment is empty, return an error message
        exit(json_encode([
            'status' => false,
            'message' => 'Comment field is empty'
        ]));
    }

    try {
        // Insert the comment into the database
        $sqlInsertComment = "INSERT INTO comments (_date, texts, user_id) VALUES (NOW(), :comment, :user_id)";
        $stmtInsertComment = $pdo->prepare($sqlInsertComment);
        $resultComment = $stmtInsertComment->execute([
            ':comment' => $comment,
            ':user_id' => $_SESSION['user_id'], // Assuming user_id is stored in session
        ]);

        // Check if the comment insertion was successful
        if ($resultComment) {
            // If successful, return a success message
            echo json_encode([
                'status' => true,
                'message' => 'Commentaire ajouté avec succès'
            ]);
        } else {
            // If insertion failed, return an error message
            echo json_encode([
                'status' => false,
                'message' => 'Commentaire échoué'
            ]);
        }

    } catch (PDOException $e) {
        // If an exception occurred, return an error message with the exception details
        echo json_encode([
            'status' => false,
            'message' => $e->getMessage()
        ]);
    }

} else {
    // If the 'Comments' parameter is not set in the POST request, return an error message
    echo json_encode([
        'status' => false,
        'message' => 'Paramètres requis manquants'
    ]);
}
?>
