<?php 
session_start();
header("Location: ../index.php");

// remove all session variables
session_unset();
// destroy the session
session_destroy();

?>
