<?php 
include("path.php");
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
    
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@500&display=swap" rel="stylesheet">
    
    <!-- style sheet -->
    <link rel="stylesheet" href="src/css/style.css">
    <title>About Us - mindQuiz</title>
</head>

<body>

    <!-- Header and menu in the holds/menu file -->
    <?php include(ROOT_PATH . "/app/headers/head.php");?>
    
    <div class="menu">
        <ul class="navigation">
            <?php if (isset(($_SESSION['id']))): ?>         
                    <li><a href="<?php echo BASE_URL . '/home.php' ?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL . '/categories.php' ?>">Categories</a></li>
                    <li><a href="<?php echo BASE_URL . '/mycategories.php' ?>">My Categories</a></li>
            <?php else: ?>        
                    <li><a href="<?php echo BASE_URL . '/home.php' ?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL . '/categories.php' ?>">Categories</a></li>
            <?php endif; ?>
        </ul>   
    </div>

    <div class="main-content">
        
        <section class="about-section">
            <h2>About Us</h2>
            <p>I am very passionate about learning and technology. My aim is to 
                create a platform that enhances learning through interactive quizzes.</p>
        </section>

        <section class="project-description">
            <h2>Project Description</h2>
            <p>This project was chosen to provide a fun and engaging way for users 
                to test their knowledge in various categories. I believe that learning 
                should be interactive and enjoyable.</p>
        </section>

        
        <section class="tech-used">
            <h2>Technology Used</h2>
            <ul>
                <li>PHP</li>
                <li>MySQL</li>
                <li>Bootstrap</li>
                <li>Chart.js</li>
                <li>Trivia API</li>
                <li>jQuery</li>
                <li>HTML</li>
                <li>CSS</li>
                <li>AJAX</li>
                <li>Javascript</li>
                
                
            </ul>
        </section>

        <section class="learned">
            <h2>What I Learned</h2>
            <p>In this class, I learned various web development techniques, including 
                database management, server-side scripting, and frontend technologies. 
                I also gained valuable experience in project management.
                The most important information to me was learning how to display data 
                of users.
            </p>
        </section>

    </div>

    <!-- Footer -->
    <?php include(ROOT_PATH . "/app/headers/footer.php");?>
    <!-- End footer -->

</body>

</html>
