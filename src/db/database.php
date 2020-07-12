<?php

function dbConnect() {
    
    if(isset($_SESSION['is_connected_to_db'])) {
        return $_SESSION['is_connected_to_db'];
    }
    
    // CREATE AND STORE CONNECTION TO DATABASE:
    
    $_SESSION['is_connected_to_db'] = mysqli_connect("localhost", "root", "", "mycms");
    return $_SESSION['is_connected_to_db'];
    
}

// SELECT * FROM tb_blogpost
function query($query) {      
    
    // Step 1: Connect to database
    
    $connection = dbConnect();
    
    if(!$connection) {
        echo mysqli_connect_error();
        return;
    }
    
    $databaseResult = mysqli_query($connection, $query);
    
    if(!$databaseResult) {
        
        echo '<div class="db-error">';
        echo mysqli_error($connection);
        echo '</div>';
    }
    
    return $databaseResult;
}

/**
 * This function returns last id
 * @name $getLastInsertedId
 * @author Tsvetan Tachev
 * @return type
 */

function getLastInsertedId() {
    
    return mysqli_insert_id(dbConnect());
}
