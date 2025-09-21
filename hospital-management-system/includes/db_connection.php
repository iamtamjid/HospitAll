<?php
// Database connection variables
$servername = "localhost";  // Change this to your server's address if not localhost
$username = "root";         // Change to your database username
$password = "";             // Change to your database password
$dbname = "hospital_mgmt";  // Change to the name of your database

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set the character set to UTF-8
mysqli_set_charset($conn, "utf8");
?>
