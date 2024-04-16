<?php

// Include database connection file
require '../config/connectdb.php';

// Check if form fields are set
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['psw'])) {
    // Sanitize input data for security
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $psw = password_hash(htmlspecialchars($_POST['psw']), PASSWORD_DEFAULT); // Hash password for security

    // Check if user already exists
    $sqlCount = "SELECT * FROM _user WHERE e_mail = :e_mail";
    $stmtCount = $pdo->prepare($sqlCount);
    $stmtCount->execute([':e_mail' => $email]);
    $resultCount = $stmtCount->fetchAll(PDO::FETCH_ASSOC);
    if (count($resultCount) > 0) {
        // User already exists, return error message
        exit(json_encode([
            'status' => false,
            'message' => 'Utilisateur existe déjà'
        ]));
    }

    try {
        // Insert new user into database
        $sql = "INSERT INTO `_user` (name, e_mail, password, is_admin) VALUES ( :name, :email, :password, :is_admin)";
        $stmt = $pdo->prepare($sql);
        // Execute query with sanitized input data
        $result = $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $psw,
            ':is_admin' => 0,
        ]);

        if ($result) {
            // Return success message if user registration is successful
            echo json_encode([
                'status' => true,
                'message' => 'Utilisateur enregistré avec succès'
            ]);

        } else {
            // Return error message if user registration fails
            echo json_encode([
                'status' => false,
                'message' => 'Failed to register user'
            ]);
        }
        // Catch any PDOExceptions that occur during execution of the above code
    } catch (PDOException $e) {
        // Return error message if exception is caught
        echo json_encode([
            'status' => false,
            'message' => $e->getMessage()
        ]);
    }
    // Return error message if any required form fields are missing
} else {
    echo json_encode([
        'status' => false,
        'message' => 'Missing required parameters'
    ]);
}
