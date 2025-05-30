<?php include("path.php");
include(ROOT_PATH . "/app/database/db.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@500&display=swap" rel="stylesheet">
    
    <!-- style sheet -->
    <link rel="stylesheet" href="src/css/style.css">

    <title>mindQuiz - Site Description</title>
    
</head>

<body>

    <!-- Header -->
    <?php include(ROOT_PATH . "/app/headers/head.php");?>

    <!-- Navigation Menu -->
    <div class="menu">
        <ul class="navigation">
            <?php if (isset(($_SESSION['id']))): ?>         
                <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home</a></li>
                <li><a href="<?php echo BASE_URL . '/categories.php' ?>">Categories</a></li>
                <li><a href="<?php echo BASE_URL . '/mycategories.php' ?>">My Categories</a></li>
            <?php else: ?>        
                <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home</a></li>
                <li><a href="<?php echo BASE_URL . '/categories.php' ?>">Categories</a></li>
            <?php endif; ?>
        </ul>   
    </div>

    <!-- Site Description Content -->
    <div class="site-description-container">
        <h1>Site Description</h1>
        
        <h2>Who Are Our Users?</h2>
        <p>
            I welcome individuals of all ages who enjoy challenging 
            their knowledge, learning new things, and engaging in fun activities. 
            Whether you're a student, a professional, or just someone looking to have 
            a good time, mindQuiz is the place for you!
        </p>

        <h2>What Do I Offer?</h2>
        <p>
            At mindQuiz, I offer a wide variety of quizzes across multiple categories. 
            My platform is designed to be user-friendly, interactive, and engaging. 
            I not only provide quizzes but also empower users like you to create 
            and share your own quizzes with the community. 
            Whether you're challenging your knowledge with my curated quizzes or 
            creating your own, I aim to provide a fun and educational experience 
            that keeps you coming back for more.
        </p>

        <h2>What Problem Am I Solving?</h2>
        <p>
            I understand that finding engaging and educational content online 
            can be challenging. With mindQuiz, I aim to solve this problem by providing a 
            platform where you can easily access a variety of quizzes that cater to your 
            interests and knowledge levels.
        </p>

        <h2>What Actions Do I Want You to Take?</h2>
        <p>
            I encourage you to explore my wide range of categories, take quizzes, 
            and share your scores. I also invite you to create an account to personalize 
            your experience and participate in my community.
        </p>
    </div>

    <!-- footer -->

    <?php include(ROOT_PATH . "/app/headers/footer.php");?>

    <!-- End footer -->

</body>

</html>
