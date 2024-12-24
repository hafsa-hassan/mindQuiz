<?php
include("path.php");
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/messages/interware.php");

userOnly();

$user_id = $_SESSION['id'];
$categories = selectAll('categories', ['user_id' => $user_id]);

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@500&display=swap" rel="stylesheet">
    
    <!-- style sheet -->
    <link rel="stylesheet" href="src/css/style.css">
    
    <title>mindQuiz</title>
</head>
<body>
    <!-- Header and menu -->
    <?php include(ROOT_PATH . "/app/headers/head.php"); ?>

    <div class="menu">
       
        <ul class="navigation">
            <?php if (isset(($_SESSION['id']))): ?>         
                    <li><a href="<?php echo BASE_URL . '/home.php' ?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL . '/categories.php' ?>">Categories</a></li>
            <?php else: ?>        
                    <li><a href="<?php echo BASE_URL . '/home.php' ?>">Home</a></li>
                    
            <?php endif; ?>
            
        </ul>   

    </div>

    <div class="page-container">
        <div class="question-content">
            <h2>Your Categories</h2>
                
            <div class="main-content">
                <?php foreach ($categories as $category): ?>
                    <?php 
                    $questionCount = count(selectAll('questions', ['category_id' => $category['id']]));
                    ?>
                    <li><a href="<?php echo BASE_URL . '/userQuestions.php?category_id=' . $category['id']; ?>"><?php echo $category['name']; ?>(<?php echo $questionCount; ?> questions)</a></li>
                <?php endforeach; ?>
            </div>
        </div>
            

    </div>

    <!-- Footer -->
        <?php include(ROOT_PATH . "/app/headers/footer.php");?>

    <!-- End Footer -->
</body>
</html>
