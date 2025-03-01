<?php

namespace Framework;

use PDO;
use Exception;
use PDOException;

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
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try
        {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
        }
        catch (PDOException $e)
        {
            throw new Exception("Database connection failed. " . $e->getMessage());
        }
    }

    /**
     * Query the database
     * 
     * @param string query
     * @param array params
     * 
     * @return PDOStatement
     * @throws PDOException
     */
    public function query($query, $params = [])
    {
        try
        {
            $sth = $this->conn->prepare($query);

            // bind named params
            foreach($params as $param => $value)
            {
                // Param is the name/key, value is the value. This way we can send multiple different parameters if necessary.
                $sth->bindValue(':' . $param, $value);
            }


            $sth->execute();
            return $sth;
        }
        catch (\PDOException $e)
        {
            throw new \Exception("Query failed to execute: " . $e->getMessage());
        }
    }
}