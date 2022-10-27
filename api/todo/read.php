<?php 
    // Headers
    header('Access-Control-Allow-Origin: *');   //Authorization stuff. May be changed 
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Todo.php';

    // Instantiate our Database and Create Connection
    $database = new Database();
    $db = $database->connect(); //Invoke the connect method from our Database class

    // Instatiate our TODO object
    $todo = new Todo($db);      //Call our TODO constructor and pass in a db con

    // TODO query
    $result = $todo->read();
    //Get Row Count
    $num_todos = $result->rowCount();

    // Check if any TODOs available or not
    if ($num_todos > 0) {
        // Array of TODOs
        $todo_arr = array();
        $todo_arr['data'] = array();    //Create a 'Data' value as our res w/ our json

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);   //import variables from the row body

            $todo_item = array(
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'created_at' => $created_at,
                'last_updated' => $last_updated,
                'status' => $status
            );

            // Push todo_item array items to "data object created initially
            array_push($todo_arr['data'], $todo_item);
        }

        // Convert data to JSON and output
        echo json_encode($todo_arr);
    }else{
        // If NO data found
        echo json_encode(
            array('message' => 'No todo items found')
        );
    }

?>