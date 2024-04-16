<?php

// Function to determine the appropriate redirect based on the given action
function redirectsTo($action = "default")
{
    // Define an array to map actions to their corresponding files
    $Actions = array();

    // Mapping actions to file paths
    $Actions["default"] = "homePage.php";
    $Actions["login"] = "login.php";
    $Actions["logout"] = "logout.php";
    $Actions["abstract"] = "abstract.php";
    $Actions["contact"] = "contact.php";
    $Actions["flower"] = "flower.php";

    // Define redirects based on user session status
    if ($_SESSION && (int) $_SESSION['is_admin'] == 0) {
        // If user is not admin, grant access to guestBook.php and deleteUser.php
        $Actions["guestBook"] = "guestBook.php";
        $Actions["deleteUser"] = "deleteUser.php";
    } else {
        // If user is admin, redirect guestBook and deleteUser actions to login page
        $Actions["guestBook"] = "login.php";
        $Actions["deleteUser"] = "login.php";
    }

    // Common actions accessible to all users
    $Actions["legalNotice"] = "legalNotice.php";
    $Actions["pasage"] = "pasage.php";
    $Actions["register"] = "register.php";
    $Actions["underWater"] = "underWater.php";
    $Actions["legelNotice"] = "legalNotice.php"; // Typo? Should this be 'legalNotice'?

    $Actions["api"] = "api.php";
    $Actions["articlesNew"] = "articlesNew.php";

    // Define admin-specific action access
    if ($_SESSION && (int) $_SESSION['is_admin'] == 15) {
        // If user is admin, grant access to admin.php
        $Actions["admin"] = "admin.php";
    } else {
        // If user is not admin, redirect admin action to login page
        $Actions["admin"] = "login.php";
    }

    // Overwriting previous definition of 'legalNotice' (if any) with correct file path
    $Actions["legalNotice"] = "legalNotice.php";

    // Get the file path corresponding to the provided action
    $control_id = $Actions[$action];

    // Check if the file exists
    if (!file_exists(__DIR__ . '/' . $control_id))
        die("file : " . $control_id . " no file ");

    // Check if the provided action exists in the mapping
    if (array_key_exists($action, $Actions)) {
        // If action exists, return the corresponding file path
        return $control_id;
    } else {
        // If action doesn't exist, return the default file path
        return $Actions["default"];
    }
}
