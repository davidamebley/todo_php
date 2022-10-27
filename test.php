<?php
// Database connection
    try {
        $db = new PDO("pgsql:host=localhost;dbname=tododb", "postgres", "Password1");
        echo 'Connected PDO';
        exit();
    } catch (PDOException $e) {
        echo $e->getMessage();
        
    }
    $db_con = pg_connect("host=localhost port=5432 dbname=tododb user=postgres password=Password1");
    if (!$db_con) {
        echo "Error PHP could not connect to Postgresql";
        exit();
    }
    $select_query = "SELECT * FROM todo";
    $result = pg_query($db_con, $select_query);
    if (!$result) {
        echo "There was an error in the query.\n";
        exit();
      }
    while($row = pg_fetch_assoc($result)){
        echo $row["todo_id"]." ".$row["description"]."<br/>";
        // echo $row["description"]."<br/>";
    }
?>