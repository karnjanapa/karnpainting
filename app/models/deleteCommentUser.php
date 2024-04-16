
<?php

// Require Database Connection
require '../config/connectdb.php';


// Check for POST Data
if (isset($_POST['commentID'])) {

    // Get the comment ID from POST data
    $commentID = htmlspecialchars($_POST['commentID']);

    // Validation: Check if comment ID is empty
    if (empty($commentID)) {
        // Return JSON response indicating failure due to missing comment ID
        exit(json_encode([
            'status' => false,
            'message' => 'commentaire est manquant'
        ]));
    }

    try {
        // Delete comment
        $sqlDeleteComment = "DELETE FROM `comments` WHERE comments_id=:comments_id";
        $stmtDeleteComment = $pdo->prepare($sqlDeleteComment);
        
        // Execute the prepared statement with comment ID
        $resultComment = $stmtDeleteComment->execute([
            ':comments_id' => $commentID,
        ]);

        // Check if deletion was successful
        if ($resultComment) {
            // Return JSON response indicating successful deletion
            echo json_encode([
                'status' => true,
                'message' => 'Commentaire supprimé avec succès'
            ]);
        } else {
            // Return JSON response indicating deletion failure
            echo json_encode([
                'status' => false,
                'message' => 'Commentaire échoué'
            ]);
        }

    } catch (PDOException $e) {
        // Return JSON response if an exception occurs during database operation
        echo json_encode([
            'status' => false,
            'message' => $e->getMessage()
        ]);
    }

} else {
    // Return JSON response if POST data is not set
    echo json_encode([
        'status' => false,
        'message' => 'Paramètres requis manquants'
    ]);
}
?>
