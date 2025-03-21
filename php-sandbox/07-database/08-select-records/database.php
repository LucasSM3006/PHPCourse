<?php

// Database configuration
$host = 'localhost';
$port = 3306;
$dbName = 'blog';
$username = 'lucas_php';
$password = 'PHPPassword_hardDifficulty';

// Connection string (DSN)
$dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";

try {
  // Create a PDO instance
  $pdo = new PDO($dsn, $username, $password);

  // Set PDO to throw exceptions on error
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // fetch as associative array by default.
  // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  // If there is an error with the connection, catch it here
  echo "Connection failed: " . $e->getMessage();
}
