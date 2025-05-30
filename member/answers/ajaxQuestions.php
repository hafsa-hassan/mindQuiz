<?php
include("../../path.php");
include(ROOT_PATH . "/app/database/db.php");

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $questions = selectAll('questions', ['category_id' => $category_id]);

    header('Content-Type: application/json');
    echo json_encode($questions);
}
?>

