<?php
    class Quiz {

        private $conn;
        private $table = 'quiz';

        public $id;
        public $name;
        public $description;

        //construct instance with db
        public function __construct($db){$this->conn = $db;}

        //get quizzes
        public function read(){
            //prepare query
            $query = 'SELECT q._id,q.Name,q.Description FROM '.$this->table. ' q';

            //prepare, execute then return statement
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

    }