<?php
    class Database {
        
        private $host = "10.10.0.7";
        private $database_name = "AwsomeCommuteDB";
        private $username = "ACUser";
        private $password = "4ws0m3C0MMu73";

        public $conn;
        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }
?>