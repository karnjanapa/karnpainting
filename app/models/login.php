<?php

// Include the database connection file
require '../config/connectdb.php';

// Check if username and password are submitted via POST request
if ($_POST['uname'] && $_POST['psw']) {
    // Check if either username or password is empty
    if (empty($_POST['uname']) || empty($_POST['psw'])) {
        // Return a JSON response indicating that all fields should be filled
        exit(json_encode([
            'status' => false,
            'message' => 'Veuillez remplir tous les champs'
        ]));
    }

    // Retrieve username and password from the POST data
    $uname = htmlspecialchars($_POST['uname']);
    $password = htmlspecialchars($_POST['psw']);

    // Prepare SQL statement to select user based on email
    $sql = "SELECT * FROM _user WHERE e_mail = :e_mail";
    $stmt = $pdo->prepare($sql);
    // Execute the prepared statement with username parameter
    $stmt->execute(['e_mail' => $uname]);
    // Fetch results as associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if user with provided email exists
    if (count($results) > 0) {
        // Verify if the provided password matches the stored hash
        if (!password_verify($password, $results[0]['password'])) {
            // Return a JSON response indicating incorrect password
            exit(json_encode([
                'status' => false,
                'message' => 'Mot de passe incorrect'
            ]));
        }

        // Start a session and store user information in session variables
        $_SESSION['user_id'] = $results[0]['user_id'];
        $_SESSION['name'] = $results[0]['name'];
        $_SESSION['email'] = $results[0]['e_mail'];
        $_SESSION['is_admin'] = $results[0]['is_admin'];

        // Return a JSON response indicating successful login
        echo json_encode([
            'status' => true,
            'message' => 'Connexion réussie'
        ]);
    } else {
        // Return a JSON response indicating user not found
        exit(json_encode([
            'status' => false,
            'message' => 'Utilisateur non trouvé'
        ]));
    }
} else {
    // Return a JSON response indicating all fields should be filled
    echo json_encode([
        'status' => false,
        'message' => 'Veuillez remplir tous les champs'
    ]);
}
