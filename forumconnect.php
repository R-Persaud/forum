<?php 

    // Create a connection 
    $conn = pg_connect("host=localhost port=5432 dbname=Forum user=postgres password= ");

    // Code written below is a step taken
    // to check that our Database is 
    // connected properly or not.
    if($conn) {
        $message = "success"; 
    } 
    else {
        die("Error". preg_last_error($conn)); 
    } 
?>