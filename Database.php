<?php

class Database
{
    public PDO $conn;

    /**
     * CONSTRUCTOR for database class
     * @param array $config
     * @throws Exception
     * 
     */
    public function __construct(array $config)
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try {
            $this->conn = new PDO($dsn, $config['user'], $config['password'], $options);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage(), $e->getCode(), $e);
        }
    }
    /**
     * Query the database
     * @param string $query
     * @return PDOStatement
     * @throws Exception
     */

    public function query(string $query): PDOStatement
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Query failed: " . $e->getMessage(), $e->getCode(), $e);
        }
    }
}
