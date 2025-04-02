<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database_name = "city";
    public $connection;

    public function connect() {
        try{
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->user, $this->password);
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
        return $this->connection;
    }
}