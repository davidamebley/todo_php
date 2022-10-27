<?php 
 class User {
    private $con;
    private $table = 'user';

    // User Properties
    public $id;
    public $email;
    public $password;
    public $created_at;
    public $last_updated;

    // Constructor with DB
    public function __construct($db){
        // Set the DB Connection
        $this->con = $db;
    }

    // Get Users
    /* public function read(){

    } */
 }

?>