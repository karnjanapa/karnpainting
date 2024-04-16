<?php

// Require Database Connection
require '../config/connectdb.php';

// Check if both titles and description are set in the POST data
if (isset($_POST['titles']) && isset($_POST['description'])) {

    // Get titles and description from POST data
    $description = htmlspecialchars($_POST['description']);
    $titles = htmlspecialchars($_POST['titles']);

    // Validation: Check if titles is empty
    if (empty($titles)) {
        // Return JSON response indicating failure due to missing titles
        exit(json_encode([
            'status' => false,
            'message' => 'Titles are required'
        ]));
    }

    // Validation: Check if description is empty
    if (empty($description)) {
        // Return JSON response indicating failure due to missing description
        exit(json_encode([
            'status' => false,
            'message' => 'Une description est requise'
        ]));
    }

    try {
        // Insert new article
        $sql = "INSERT INTO articles (`titles`, `description`) VALUES (:titles, :description)";
        $stmt = $pdo->prepare($sql);
        
        // Execute the prepared statement with titles and description
        $result = $stmt->execute([
            ':titles' => $titles,
            ':description' => $description,
        ]);

        // Check if insertion was successful
        if ($result) {
            // Return JSON response indicating successful insertion
            echo json_encode([
                'status' => true,
                'message' => 'Nouvel article ajouté avec succès'
            ]);
        } else {
            // Return JSON response indicating insertion failure
            echo json_encode([
                'status' => false,
                'message' => 'Échec de ajout'
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
    // Return JSON response if titles or description are not set in the POST data
    echo json_encode([
        'status' => false,
        'message' => 'Paramètres requis manquants'
    ]);
}

