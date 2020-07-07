<?php

function query($query) {      // SELECT * FROM tb_blogpost
    
    // Step 1: Connect to database
    
   $connection = mysqli_connect("localhost", "root", "", "mycms");
    
    if(!$connection) {
        echo mysqli_connect_error();
        return;
    }
    
    return mysqli_query($connection, $query);
}

