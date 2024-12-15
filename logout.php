<?php
session_start();

// Destroy the session and log the user out
session_unset();  // Unsets all session variables
session_destroy(); // Destroys the session

// Redirect to the welcome page (e.g., welcome.php)
header('Location: index.html');
exit();
?>
