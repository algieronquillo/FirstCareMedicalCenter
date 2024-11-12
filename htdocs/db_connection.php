<?php
$servername = "127.0.0.1"; // or your database server
$username = "mariadb"; // or your database username
$password = "mariadb"; // or your database password
$dbname = "mariadb"; // replace with your actual database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
