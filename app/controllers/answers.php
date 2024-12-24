<?php
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/messages/interware.php");
include(ROOT_PATH . "/app/messages/validateAnswer.php");


$table = 'answers';
$errors = array();
$user_id = $_SESSION['id'];
$answer_text = array_fill(0, 4, '');  
$question_id = '';
$category_id = '';
$option_letter ='';

$categories = selectAll('categories', ['user_id' => $user_id]);

$organizedQuestions = [];

foreach ($categories as $category) {
    $questions = selectAll('questions', ['category_id' => $category['id']]);
    
    foreach ($questions as &$question) {
        $question['answers'] = selectAll('answers', ['question_id' => $question['id']]);
    }
    
    $organizedQuestions[$category['name']] = $questions;
    
    
    $category['external_link'] = '../external_folder/' . $category['name'] . '.php';
}

if (isset($_GET['id'])) {
    $question_id = $_GET['id'];
    $answers = selectAll('answers', ['question_id' => $question_id]);
    if ($answers) {
        
        $answer = $answers[0];
        $answer_text = explode('|', $answer['answer_text']);
        $category_id = $answer['category_id'];
        $option_letter = $answer['option_letter'];
    }
}

if (isset($_POST['add-answer'])) {
    userOnly();
    $answer_text = $_POST['answer_text'];
    $correct_index = array_search($_POST['is_correct'], ['A', 'B', 'C', 'D']);
    $question_id = $_POST['question_id'];
    $category_id = $_POST['category_id'];

    $errors = validateAnswer($_POST);

    if (count($errors) == 0) {
        unset($_POST['add-answer'], $_POST['is_correct']);
        
        foreach ($answer_text as $key => $text) {
        $data = [
            'question_id' => $question_id,
            'answer_text' => $text,
            'option_letter' => chr(65 + $key),
            'is_correct' => ($key === $correct_index) ? 1 : 0,
            'category_id' => $category_id 
        ];

        create($table, $data);
    }

        $_SESSION['message'] = 'Multiple Choice Answers created successfully';
        $_SESSION['type'] = 'success-message';
        header('location: ' . BASE_URL . '/member/answers/index.php');
        exit();
    }
}

if (isset($_POST['edit-answer'])) {
    userOnly();
    $question_id = $_POST['question_id'];
    $answer_text = $_POST['answer_text'];
    $correct_index = array_search($_POST['is_correct'], ['A', 'B', 'C', 'D']);
    $category_id = $_POST['category_id'];

    $errors = validateAnswer($_POST);

    if (count($errors) == 0) {
        
        delete('answers', ['question_id' => $question_id]);


        foreach ($answer_text as $key => $text) {
            $data = [
                'question_id' => $question_id,
                'answer_text' => $text,
                'option_letter' => chr(65 + $key),
                'is_correct' => ($key === $correct_index) ? 1 : 0,
                'category_id' => $category_id 
            ];

            create($table, $data);
        }

        $_SESSION['message'] = 'Answers updated successfully';
        $_SESSION['type'] = 'success-message';
        header('location: ' . BASE_URL . '/member/answers/index.php');
        exit();
    }
}



if (isset($_GET['del_id'])) {
    userOnly();
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = 'Answer deleted successfully';
    $_SESSION['type'] = 'success-message';
    header('location: ' . BASE_URL . '/member/answers/index.php');
    exit();
}
