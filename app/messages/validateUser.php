<?php

function validateUser($user){

    $errors = array();

    if (empty($user['firstname'])) {
        array_push($errors, 'Firstname is required');
    }

    if (empty($user['lastname'])) {
        array_push($errors, 'Lastname is required');
    }

    if (empty($user['username'])) {
        array_push($errors, 'Username is required');
    }

    if (empty($user['email'])) {
        array_push($errors, 'Email is required');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password is required');
    }

    if ($user['repassword'] !== $user['password']) {
        array_push($errors, 'Password do not match');
    }


    $existingUser = selectOne('users', ['username' => $user['username']]);
    if($existingUser){
        
        if (isset($user['register-btn']) ) {
            array_push($errors, 'Username already exists');
        }
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if($existingUser){

        if (isset($user['register-btn']) ) {
            array_push($errors, 'Email already exists');
        }
        
    }

    return $errors;

}


function validateLogin($user){
    $errors = array();

    if (empty($user['username'])){
        array_push($errors, 'Username is required');
    }

    if (empty($user['password'])){
        array_push($errors, 'Password is required');
    }
    
    
    return $errors;
}

?>