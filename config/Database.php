<?php
// Database connection
    class Database {
        //DB Parameters
        private $host = 'localhost';
        private $port = '8080';
        private $db_name = 'php_todo';
        private $user = 'postgres';
        private $password = 'Password1';
        private $con;

        //Connect
        public function connect(){
            $this->con = null;

            try {
                $this->con = new PDO("pgsql:host=".$this->host.";dbname=".$this->db_name, $this->user, $this->password);
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Connection Error: '.$e->getMessage();
            }

            return $this->con;
        }
    }
?>