<?php

function validateAnswer($answer){
    $errors = array();

    if (empty($answer['category_id'][0])){
        array_push($errors, 'Category Option is required');
    }
    
    if (empty($answer['question_id'])){
        array_push($errors, 'Question is required');
    }

    if (empty($answer['answer_text'][0]) || empty($answer['answer_text'][1]) || empty($answer['answer_text'][2]) || empty($answer['answer_text'][3])){
        array_push($errors, 'All Answer Choices are required');
    }

    if (empty($answer['is_correct'])){
        array_push($errors, 'Correct Option is required');
    }


    return $errors;
}
