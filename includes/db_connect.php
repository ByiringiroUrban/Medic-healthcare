<?php
// Database configuration
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // Default username for XAMPP/WAMP
define('DB_PASSWORD', '');     // Default password for XAMPP/WAMP is empty
define('DB_NAME', 'medic_db');

// Attempt to connect to MySQL database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Start the session on every page that includes this file
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
