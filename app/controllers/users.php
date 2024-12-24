<?php
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/messages/interware.php");
include(ROOT_PATH . "/app/messages/validateUser.php");



$errors = array();
$firstname = '';
$lastname = '';
$username = '';
$email = '';
$password = '';
$repassword = '';
$table = 'users';



function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success-message';

    header('location: ' . BASE_URL . '/home.php');
        exit();
}

$user = selectOne($table, ['id' => $_SESSION['id']]);

if (isset($_GET['id'])) {
    
    $user = selectOne($table, ['id' => $_GET['id']]);

    $id = $user['id'];
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
    $username = $user['username'];
    $email = $user['email'];
}

if (isset($_POST['register-btn'])){
    $errors = validateUser($_POST);

    if (count($errors) === 0){

        unset($_POST['register-btn'], $_POST['repassword']);

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user_id = create($table, $_POST);
        $user = selectOne($table, ['id' => $user_id]);

        // user log in
        loginUser($user);

    }else {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
    }
    
}

if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            // user log in
            loginUser($user);
        } else {
            array_push($errors, 'wrong credentials');
        }
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
}

if (isset($_POST['update-user'])) {
    useronly();
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['repassword'], $_POST['update-user'], $_POST['id']);

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $count = update($table, $id, $_POST);
        $_SESSION['message'] = 'User updated';
        $_SESSION['type'] = 'success-message';
        header('location: ' . BASE_URL . '/member/users/index.php');
        exit();
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
    }
}


