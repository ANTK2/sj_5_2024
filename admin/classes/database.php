<?php
class Database {
    private $host = 'localhost:3306';
    private $username = 'root';
    private $password = '';
    private $database = 'novinyslovakia';
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if($this->conn->connect_error){
            error_log("Error: ". $this->conn->connect_error);
            die("Error: ");
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }
    
    public function getConn() {
        return $this->conn;
    }

    public function close() {
        $this->conn->close();
    }
}
?>