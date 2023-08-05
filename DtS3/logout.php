<?php
  // Initialize the session
  session_start();

  // Unset all of the session variables
  $_SESSION = array();

  // Destroy the session
  session_destroy();

  // Redirect to another page or display a message
  header("Location: index.php");
  exit;
?>

