<?php include("path.php");
include(ROOT_PATH . "/app/database/db.php");

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
    
    <?php include(ROOT_PATH . "/app/headers/head.php");?>

    <?php include(ROOT_PATH . "/app/headers/messages.php");?>
    <!-- page-container -->
    <div class="page-container">
        
        <!-- content -->
        <div class="content">
            <h1>Welcome to MindQuiz</h1>
            <p>Get ready to challenge your mind with our exciting quizzes! Select your favorite categories and start playing.</p>
            <a href="<?php echo BASE_URL . '/categories.php' ?>" class="btn btn-primary">Get Started</a>
        </div>

        <!-- End content -->
    </div>
    <!-- page-container -->

    <!-- footer -->

    <?php include(ROOT_PATH . "/app/headers/footer.php");?>

    <!-- End footer -->

</body>

</html>