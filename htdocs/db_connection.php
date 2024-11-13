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


// PDO connection setup
try {
    // Initialize PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Optionally, you can set the character encoding to UTF-8 for better handling of special characters
    $pdo->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    // Handle connection failure
    die("Connection failed: " . $e->getMessage());
}
?>
