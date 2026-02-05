<?php
// Database server name (localhost for XAMPP)
$servername = "localhost";

// Database username (default for XAMPP is 'root')
$username = "root";

// Database password (empty by default in XAMPP)
$password = "";

// Database name (must match exactly with phpMyAdmin)
$dbname = "amazon_db";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection failed
if ($conn->connect_error) {
    // Stop the script and display the error message
    die("Connection failed: " . $conn->connect_error);
}

// If no error occurs, the database connection is successful
?> <!--Database connection established successfully-->

