
  
 
<?php


// Main controller

// Start or resume the session
session_start();

// Include the configuration file
require dirname(__FILE__) . "/app/controllers/config.php";

// Include the routing file
require RACINE . "/controllers/route.php";

// Get the 'action' parameter from the URL query string, or default to 'default'
$action = isset($_GET["action"]) ? $_GET["action"] : "default";

// Determine which controller file to include based on the action
$file = redirectsTo($action);

// Include the determined controller file
require RACINE . "/controllers/" . $file;
