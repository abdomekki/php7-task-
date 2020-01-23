<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "route_backend_db";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>