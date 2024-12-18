<?php

class Database
{
    private $serverName = "localhost";
    private $userName = "root";
    private $passWord = "";
    private $dbname = "futchampion";
    protected $conn;

    public function __construct(){
        $this->conn = new mysqli($this->serverName, $this->userName, $this->passWord, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}

?>
