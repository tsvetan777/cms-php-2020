<?php

class Auth {
    
    static function isUserAlreadyExists($columnName) {
        
        $userName   = $columnName['user_name'];
        $userEmail  = $columnName['user_email'];
        
        $validateIfRegistrationUserAlreadyExistQuery = 
                " SELECT * FROM tb_users "
              . " WHERE name = '$userName' OR email = '$userEmail' ";
        
        $requestResult = Database::get($validateIfRegistrationUserAlreadyExistQuery);
        
        return ($requestResult != null);
    }
    
    
    static function createNewUserInDatabase($databaseColumn) {
        Database::insert('tb_users', array(
            'name'      => $databaseColumn['user_name'],
            'fname'     => $databaseColumn['user_fname'],
            'lname'     =>$databaseColumn['user_lname'],
            'email'     => $databaseColumn['user_email'],
            'password'  => $databaseColumn['user_pass']
        ));
    }
    
    
    static function assignRoleToUser($userId, $roleId) {
        
        return Database::insert('tb_user_role', array(
            'user_id' => $userId,
            'role_id' => $roleId
        ));
    }
    
    
    static function createNewUser($databaseColumn) {
        
        $isUserCreated = Auth::createNewUserInDatabase($databaseColumn);
        
        if($isUserCreated) {
            return Auth::assignRoleToUser(Database::getLastInsertedId(), 1);
        }
    }
    
    
    static function setAuthenticatedUser($authenticatedCollectionData) {
        
        $_SESSION['user_data_collection']   = $authenticatedCollectionData['user_data_collection'];
        $_SESSION['user_role_collection']   = $authenticatedCollectionData['user_role_collection'];
        $_SESSION['is_authenticated']       = true;
    }
    
    
    static function isAuthenticated() {
        return (isset($_SESSION['is_authenticated'])) ? $_SESSION['is_authenticated'] : false;      
    }
    
    
    static function isNotAuthenticated() {
        return !Auth::isAuthenticated();
    }
    
    
    static function isUser() {
        return Auth::isAuthenticated() && Auth::hasRole('USER');
    }
    
    
    static function isModerator() {
        return Auth::isAuthenticated() && Auth::hasRole('MODERATOR');
    }
    
    
    static function isAdmin() {
        return Auth::isAuthenticated() && Auth::hasRole('ADMIN');
    }
    
    
    static function signout() {
        session_destroy();
    }
    
    
    private static function hasRole($roleTitle) {
        
        foreach ($_SESSION['user_role_collection'] as $key => $value) {
            if($value['role_title'] == $roleTitle) {
                return true;
            }
        }
        return false;
    }
}