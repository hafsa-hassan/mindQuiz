<?php
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/messages/interware.php");
include(ROOT_PATH . "/app/messages/validateQuestion.php");

$table = 'questions';
$errors = array();
$user_id = $_SESSION['id'];
$question_text = '';
$category_id = '';

$categories = selectAll('categories', ['user_id' => $user_id]);
$questions = selectAll($table, ['user_id' => $user_id]);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $question = selectOne($table, ['id' => $id]);
    $id = $question['id'];
    $user_id = $question['user_id'];
    $category_id = $question['category_id'];
    $question_text = $question['question_text'];
}

if (isset($_POST['add-question'])) {
    userOnly();
    $question_text = $_POST['question_text'];
    $category_id = $_POST['category_id'];

    $errors = validateQuestion($_POST);

    if (count($errors) == 0) {
        unset($_POST['add-question']);
        $_POST['user_id'] = $user_id;
        $question_id = create($table, $_POST);
        
        if ($question_id) {
            $_SESSION['message'] = 'Question created successfully';
            $_SESSION['type'] = 'success-message';
            header('location: ' . BASE_URL . '/member/questions/index.php');
            exit();
        } else {
            $_SESSION['message'] = 'Failed to create question';
            $_SESSION['type'] = 'error-message';
        }
    } else {
        
        $question_text = $_POST['question_text'];
        $category_id = $_POST['category_id'];
    }
}



if (isset($_POST['edit-question'])) {
    userOnly();
    $errors = validateQuestion($_POST);

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['edit-question'], $_POST['id']);
        $_POST['user_id'] = $user_id;
        
        $question_id = update($table, $id, $_POST);

        if ($question_id) {
            $_SESSION['message'] = 'Question updated successfully';
            $_SESSION['type'] = 'success-message';
            header('location: ' . BASE_URL . '/member/questions/index.php');
            exit();
        }else{
            $_SESSION['message'] = 'Failed to Update question';
            $_SESSION['type'] = 'error-message';
            header('location: ' . BASE_URL . '/member/questions/index.php');
            exit();
        }
    } else {
        $category_id = $_POST['category_id'];
        $question_text = $_POST['question_text'];
    }
}

if (isset($_GET['del_id'])) {
    userOnly();
    $id = $_GET['del_id'];

    
    $answers = selectAll('answers', ['question_id' => $id]);

    if ($answers) {
        
        $_SESSION['message'] = 'This question has answers. Delete the answers in edit then delete question';
        $_SESSION['type'] = 'error-message';
        $_SESSION['delete_question_with_answers'] = true;
    } else {
        
        $deletedQuestion = delete($table, $id);

        if ($deletedQuestion) {
            $_SESSION['message'] = 'Question deleted successfully';
            $_SESSION['type'] = 'success-message';
        } else {
            $_SESSION['message'] = 'Failed to delete question';
            $_SESSION['type'] = 'error-message';
        }
    }

    header('location: ' . BASE_URL . '/member/questions/index.php');
    exit();
}



