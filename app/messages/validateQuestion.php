<?php

function validateQuestion($question){
    $errors = array();

    if (empty($question['question_text'])){
        array_push($errors, 'Question Text is required');
    }

    if (empty($question['category_id'])){
        array_push($errors, 'Category is required');
    }

    return $errors;
}


