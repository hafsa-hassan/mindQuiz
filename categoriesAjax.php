<?php

$api_url = "https://opentdb.com/api_category.php";
$response = file_get_contents($api_url);
echo $response;
?>
