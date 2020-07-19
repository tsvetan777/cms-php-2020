<?php

class Database {
    
    static $dbConnection = NULL;

    static function dbConnect() {
        
        if(Database::$dbConnection == NULL) {
            Database::$dbConnection = mysqli_connect("localhost", "root", "", "mycms");
        }
  
        return Database::$dbConnection;
    }
    
    
    static function query($query) {
        
        // Connect to database:
        
        $connection - Database::dbConnect();
        // connection = mysqli_connect("localhost", "root", "", "mycms");
        
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
    
    /*
     * This function returns last ID
     * @name getLastInsertedId
     * @author Tsvetan Tachev
     * @return type
     */
    
    static function getLastInsertedId() {
        return mysqli_insert_id(Database::dbConnect());
    }
    
    
    static function get($databaseQuery) {
        
        $databaseResultSet = Database::query($databaseQuery);
        return mysqli_fetch_assoc($databaseResultSet);
    }
    
    
    static function getall($databaseQuery) {
        
        $resultCollection   = array();
        $databaseResultSet  = Database::query($databaseQuery);
        
        while ($result = mysqli_fetch_assoc($databaseResultSet)) {
            array_push($resultCollection, $result);
        }
        return $resultCollection;
    }


    static function fetch($databaseResultSet) {
        
        return mysqli_fetch_assoc($databaseResultSet);
    }
}

