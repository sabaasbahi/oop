<?php 

class DB{
    private $host;
    private $user;
    private $password;
    private $database;
    private $connection;

    public function __construct(){
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "course2";

        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);
    }

    public function getConnection(){
        return $this->connection;
    }

    public function closeConnection(){
        $this->connection->close();
    }

    public function getErrors(){
        return $this->connection->error;
    }
}