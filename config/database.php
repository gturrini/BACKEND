<?php
    class Database {
        
        private $host = "awsomecommutedbcluster.cluster-cpckepgulcag.eu-west-2.rds.amazonaws.com";
        private $database_name = "AwsomeCommuteDB";
        private $username = "root";
        private $password = "6pLu5FKasaEhNAk4ofGPyGG6uEVSeJTX";

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
