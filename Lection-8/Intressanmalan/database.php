<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "registrationsdb";
try {
    // connection to database!
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "<p class='alert alert-success'>Connected successfully</p>";
} catch (PDOException $e) {
    echo "<p class='alert alert-danger'>Connection failed: " . $e->getMessage() . "</p>";
};
//register.php