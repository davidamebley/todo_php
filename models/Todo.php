<?php 
 class Todo {
    private $con;
    private $table = 'todo';

    // TODO Table Properties
    public $id;
    public $name;
    public $description; //Optional
    public $user_id;    //Foreign Key
    public $created_at;
    public $last_updated;
    public $status;     //Enum: NotStarted, OnGoing, Completed

    // Constructor with DB
    public function __construct($db){
        // Set the DB Connection
        $this->con = $db;
    }

    // Get Users
    public function read()
 }

?>