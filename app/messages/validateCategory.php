<?php

function validateCategory($category){
    $errors = array();

    if (empty($category['name'])){
        array_push($errors, 'Name is required');
    }

    $existingCategory = selectOne('categories', ['name' => $category['name']]);
    if($existingCategory){

        if (isset($category['update-category']) && $existingCategory['id'] != $category['id']) {
            array_push($errors, 'Name already exists');
        }
        if (isset($category['add-category']) ) {
            array_push($errors, 'Name already exists');
        }
    }

    return $errors;
}

