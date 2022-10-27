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

    // Get Todos
    public function read(){
        // Query to SELECT all TODOS
        $query = 'SELECT
                t.id,
                t.name,
                t.description,
                t.created_at,
                t.last_updated,
                t.status
            FROM
                '.$this->table.' t
                ORDER BY
                t.created_at DESC';

        // Prepare Statement
        $stmt = $this->con->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }
 }

?>