<?php

class Auth {
    
    static function isUserAlreadyExists($columnName) {
        
        $userName   = $columnName['user_name'];
        $userEmail  = $columnName['user_email'];
        
        $validateIfRegistrationUserAlreadyExistQuery = 
                "SELECT * FROM tb_users "
                . "WHERE name = '$userName' OR email = '$userEmail'";
        
        $requestResult = Database::get($validateIfRegistrationUserAlreadyExistQuery);
        
        return ($requestResult != null);
    }
    
    
    static function createNewUserInDatabase($databaseColumn) {
        
        $userName   = $databaseColumn['user_name'];
        $userFname  = $databaseColumn['user_fname'];
        $userLname  = $databaseColumn['user_lname'];
        $userEmail  = $databaseColumn['user_email'];
        $userPass   = $databaseColumn['user_pass'];
        
        $createNewUserRequest = "INSERT INTO tb_users(name, fname, lname, email, password)"
                . "VALUES('$userName', '$userFname', '$userLname', '$userEmail', '$userPass')";
        
        return Database::query($createNewUserRequest);
    }
    
    
    static function assignRoleToUser($userId, $roleId) {
        
        $assignRoleToInsertedUserQuery = "INSERT INTO tb_user__role(user_id, role_id)"
                                       . "VALUES($userId, $roleId)";
        
        return Database::query($assignRoleToInsertedUserQuery);
    }
    
    
    static function createNewUser($databaseColumn) {
        
        $isUserCreated = Auth::createNewUserInDatabase($databaseColumn);
        
        if($isUserCreated) {
            return Auth::assignRoleToUser(Database::getLastInsertedId(), 1);
        }
    }
    
    
    static function setAuthenticationFlagToAvailable() {
        $_SESSION['is_authenticated'] = true;
    }
    
    
    static function isAuthenticated() {
        
        if(isset($_SESSION['is_authenticated'])) {
            return true;
        } 
        return false;
    }
    
    
    static function isNotAuthenticated() {
        return !Auth::isAuthenticated();
    }
    
    
    static function signout() {
        
        session_destroy();
    }
}