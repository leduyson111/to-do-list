<?php

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8';
    private $dbname = 'to-do-list';
    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';charset=' . $this->charset . ';dbname=' . $this->dbname;

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_LOWER
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function testConnection()
    {
        
    }
}
