<?php

function userOnly($redirect = '/home.php')
{
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'Login';
        $_SESSION['type'] = 'error-message';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

function guestsOnly($redirect = '/home.php')
{
    if (isset($_SESSION['id'])) {
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

?>