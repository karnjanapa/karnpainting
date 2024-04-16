


<?php
// Start a session to work with session variables
session_start();

// Destroy all data registered to the session
session_destroy();

// Redirect the user to the specified location after destroying the session
header('Location: ./?action=default');
?>
