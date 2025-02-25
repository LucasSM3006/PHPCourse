<?php

// Database credentials.
$HOST = 'localhost';
$PORT = 3306;
$DB_NAME = 'blog';

// User creds.
$USERNAME = 'lucas_php';
$PASSWORD = 'PHPPassword_hardDifficulty';

$DSN = "mysql:host={$HOST};port={$PORT};dbname={$DB_NAME};charset=utf8";

try
{
    // Create a PDO instance
    $PDO = new PDO($DSN, $USERNAME, $PASSWORD);

    // Set PDO to throw exceptions on error
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Database connected...";
}
catch (PDOException $e)
{
    echo "Connection failed. Error message: " . $e->getMessage();
}