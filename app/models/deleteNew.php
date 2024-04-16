<?php

// Require Database Connection
require '../config/connectdb.php';

// Check if article_id is set in the POST data
if (isset($_POST['article_id'])) {

    // Get the article_id from POST data
    $article_id = htmlspecialchars($_POST['article_id']);

    // Validation: Check if article_id is empty
    if (empty($article_id)) {
        // Return JSON response indicating failure due to missing article_id
        exit(json_encode([
            'status' => false,
            'message' => 'Échec de la suppression'
        ]));
    }

    try {
        // Delete article
        $sqlDeleteNew = "DELETE FROM `articles` WHERE article_id=:article_id";
        $stmtDeleteNew = $pdo->prepare($sqlDeleteNew);
        
        // Execute the prepared statement with article_id
        $resultNew = $stmtDeleteNew->execute([
            ':article_id' => $article_id,
        ]);

        // Check if deletion was successful
        if ($resultNew) {
            // Return JSON response indicating successful deletion
            echo json_encode([
                'status' => true,
                'message' => 'Article supprimé avec succès'
            ]);
        } else {
            // Return JSON response indicating deletion failure
            echo json_encode([
                'status' => false,
                'message' => 'Échec de la suppression'
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
    // Return JSON response if article_id is not set in the POST data
    echo json_encode([
        'status' => false,
        'message' => 'Paramètres requis manquants'
    ]);
}
