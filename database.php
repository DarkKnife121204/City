<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database_name = "city";
    public $connection;

    public function connect() {

        $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->user, $this->password);

        return $this->connection;
    }
}