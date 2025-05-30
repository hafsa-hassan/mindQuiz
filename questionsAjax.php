<?php

$category_id = $_GET['category_id'];
$api_url = "https://opentdb.com/api.php?amount=10&category=" . $category_id . "&difficulty=medium&type=multiple";

$response = file_get_contents($api_url);
echo $response;
?>
