<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "login_register";

try {
    // Set the Data Source Name (DSN)
    $dsn = "mysql:host=$servername;dbname=$db_name;charset=utf8mb4";

    // Create a PDO instance
    $conn = new PDO($dsn, $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Output a success message (for debugging)
    // echo "Connected successfully";
} catch (PDOException $e) {
    // Handle connection errors
    die("Connection failed: " . $e->getMessage());
}
?>
