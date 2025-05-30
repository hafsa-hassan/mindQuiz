<?php
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/messages/interware.php");
include(ROOT_PATH . "/app/messages/validateCategory.php");

$table = 'categories';
$errors = array();
$id = '';
$name = '';

$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null; 
if ($user_id) {
    $categories = selectAll($table, ['user_id' => $user_id]);
} else {
    $categories = [];
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $category = selectOne($table, ['id' => $id]);
    
    $id = $category['id'];
    $name = $category['name'];
}

if (isset($_POST['add-category'])) {
    userOnly();
    $errors = validateCategory($_POST);

    if (count($errors) == 0) {
        unset($_POST['add-category']);
        $_POST['user_id'] = $user_id;
        
        $category_id = create($table, $_POST);
        
        
        $_SESSION['message'] = 'Category created successfully';
        $_SESSION['type'] = 'success-message';
        header('location: ' . BASE_URL . '/member/categories/index.php');
        exit();
        
    } else {
        $name = $_POST['name'];
    }
}

if (isset($_POST['update-category'])) {
    userOnly();
    $errors = validateCategory($_POST);

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['update-category'], $_POST['id']);
        $category_id = update($table, $id, $_POST);
        $_SESSION['message'] = 'category updated successfully';
        $_SESSION['type'] = 'success-message';
        header('location: ' . BASE_URL . '/member/categories/index.php');
        exit();
    } else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        
    }
}

if (isset($_GET['del_id'])) {
    userOnly();
    $id = $_GET['del_id'];

    $questions = selectAll('questions', ['category_id' => $id]);

    if ($questions) {
        
        $_SESSION['message'] = 'This category has questions. Delete the answers in edit then delete questions';
        $_SESSION['type'] = 'error-message';
        $_SESSION['delete_category_with_questions'] = true; 
    } else {

        $count = delete($table, $id);

        if ($count) {
            $_SESSION['message'] = 'Category deleted successfully';
            $_SESSION['type'] = 'success-message';
        } else {
            $_SESSION['message'] = 'Failed to delete category';
            $_SESSION['type'] = 'error-message';
        }
    }

    header('location: ' . BASE_URL . '/member/categories/index.php');
    exit();
}


