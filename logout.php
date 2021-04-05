<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
$error = "Successful Sign out";
$_SESSION["error"] = $error;
header("location: ./index.php");
exit;
?>