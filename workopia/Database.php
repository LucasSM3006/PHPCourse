<?php

class Database 
{
    public $conn;

    /**
     * Constructor
     * 
     * @param array $config
     * 
     * Obs. Config holds the host, port, db_name, username, and password. It's an array that expects all of those fields to be there.
     */

    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['db_name']};charset=utf8";

        $options =
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try
        {
            $this->conn = new PDO($dsn, $config['username'], $config['password']);
        }
        catch (PDOException $e)
        {
            throw new Exception("Database connection failed. " . $e->getMessage());
        }
    }
}