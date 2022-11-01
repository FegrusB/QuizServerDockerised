<?php
    class Database {

        //db setup data
        private $host = 'db';
        private $db_name = 'myquizappdb';
        private $username = 'root';
        private $password = 'MYSQL_ROOT_PASSWORD';
        private $conn;

        //try catch to connect to db with given configs
        public function connect() {
            $this->conn = null;

            try{
                $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,$this->username,$this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e) {echo 'Connection Error: '.$e->getMessage();}
        
            return $this->conn;
        
        }
    }