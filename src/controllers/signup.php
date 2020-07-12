<?php

function isUserAlreadyExists($columnName) {
    
    $userName   = $columnName['user_name'];
    $userEmail  = $columnName['user_email'];
    
    $validateIfRegistrationUserAlreadyExistQuery = "SELECT * FROM tb_users WHERE "
            . "name = '$userName' OR email = '$userEmail'";
    $databaseQueryRedult    = query($validateIfRegistrationUserAlreadyExistQuery);
    $requestResult          = mysqli_fetch_assoc($databaseQueryRedult); 
    
    return ($requestResult != null);
}

function createNewUserInDatabase($databaseColumn) {
    
    $userName   = $databaseColumn['user_name'];
    $userFname  = $databaseColumn['user_fname'];
    $userLname  = $databaseColumn['user_lname'];
    $userEmail  = $databaseColumn['user_email'];
    $userPass   = $databaseColumn['user_pass'];
    
    $createNewUserRequest   = "INSERT INTO tb_users(name, fname, lname, email, pass)"
                            . "VALUES('$userName', '$userFname', '$userLname', '$userEmail', '$userPass')";
    
    return query($createNewUserRequest);
}

        // UPDATE:
function assignRoleToUser($userId, $roleId) {
    
    $assignRoleToInsertedUserQuery  = "INSERT INTO tb_user__role(user_id, role_id)"
                                    . "VALUES($lastInsertedId, $userRoleId)";
    
    return query($assignRoleToInsertedUserQuery);
    
}

if(isset($_POST['user_request_tokken']) AND $_POST['user_request_tokken'] == 1) {
    
    $userName       = isset($_POST['user_name'])        ? $_POST['user_name']           : '';
    $userFName      = isset($_POST['user_fname'])       ? $_POST['user_fname']          : '';
    $userLName      = isset($_POST['user_lname'])       ? $_POST['user_lname']          : '';
    $userEmail      = isset($_POST['user_email'])       ? $_POST['user_email']          : '';
    $userPass       = isset($_POST['user_pass'])        ? $_POST['user_pass']           : '';
    $userPassRepeat = isset($_POST['user_pass_repeat']) ? $_POST['user_pass_repeat']    : '';
    
    
    if(strlen($userName) < 3) {
        return setFormError('signup', 'user_name', 'Min lenght 3 characters is required');
    }
        
    if(strlen($userFName) < 3) {
        return setFormError('signup', 'user_fname', 'Min lenght 3 characters is required');   
    }
    
    if(strlen($userLName) < 3) {
        return setFormError('signup', 'user_lname', 'Min lenght 3 characters is required');
    }
    
    if(strlen($userEmail) < 5) {
        return setFormError('signup', 'user_email', 'Min lenght 5 characters is required');
    }

    if($userPass != $userPassRepeat) {
        return setFormError('signup', 'user_pass', 'User password and password repeat must be the same string');
    }
    
    if($isUserAlreadyExists(array('user_name' => $userName, 'user_email' => $userEmail))) {
        return setFormError('signup', 'user_name', 'This user already exists!');
    }
    
    $isUserCreated = createNewUserInDatabase(array(
        'user_name'     => $userName,
        'user_fname'    => $userFname,
        'user_lname'    => $userLname,
        'user_email'    => $userEmail,
        'user_pass'     => $userPass
    ));
    
    if($isUserCreated) {
        
        $isRoleAssignedSuccessfully = assignRoleToUser(getLastInsertedId(), 1);
    
        if($isRoleAssignedSuccessfully) {
           echo 'User created successfully!';
        }
    }
    
}




