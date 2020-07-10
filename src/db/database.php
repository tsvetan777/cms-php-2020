<?php

// SELECT * FROM tb_blogpost
function query($query) {      
    
    // Step 1: Connect to database
    
   $connection = mysqli_connect("localhost", "root", "", "mycms");
    
    if(!$connection) {
        echo mysqli_connect_error();
        return;
    }
    
    $databaseResult = mysqli_query($connection, $query);
    
    if(!$databaseResult) {
        
        echo '<div class="db-error>"';
        echo mysqli_error($connection);
        
    }
    
    return $databaseResult;
}

