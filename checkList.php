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

    <title>Quiz App - Checklist</title>
    
</head>
<body>
    <!-- Header  -->
    
    <?php include(ROOT_PATH . "/app/headers/head.php");?>
    <div class="menu">
       
        <ul class="navigation">
            <?php if (isset(($_SESSION['id']))): ?>         
                    <li><a href="<?php echo BASE_URL . '/home.php' ?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL . '/mycategories.php' ?>">My Categories</a></li>
            <?php else: ?>        
                    <li><a href="<?php echo BASE_URL . '/home.php' ?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL . '/categories.php' ?>">Categories</a></li>
                    
            <?php endif; ?>
            
        </ul>   

    </div>


    <div class="container mt-5">
        <h1 class="text-center">Quiz App Checklist</h1>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <h3>1. Database Usage</h3>
                <p>
                    I store various types of user information in a custom database table to 
                    enhance your personalized experience on my platform. This includes:
                    <ul>
                        <li>User Profiles: I save details such as usernames and passwords securely 
                            to ensure a unique and secure login for each user.</li>
                        <li>Custom Categories: When you create your own categories, I store 
                            them in the database, allowing you to easily access and manage 
                            them later.</li>
                        <li>Custom Questions and Answers: Your custom-made questions and 
                            answers are also stored in the database, ensuring you can revisit, 
                            edit, or delete them as you see fit.</li>
                    </ul>
                    Additionally, I display these stored details dynamically on the platform 
                    to provide a seamless and efficient user experience.
                </p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <h3>2. Ajax Usage</h3>
                <p>
                    I use Ajax (Asynchronous JavaScript and XML) extensively on my platform 
                    to enhance your experience by updating information on the page without 
                    requiring a full page reload. Specifically, I use Ajax for:
                    <ul>
                        <li>Fetching and displaying questions, answers, and categories from both 
                            the trivia API and my own database in real-time.</li>
                        <li>Dynamic loading of quiz content, ensuring a seamless and responsive 
                            experience for you.</li>
                    </ul>
                    By leveraging Ajax, I ensure you have access to up-to-date and 
                    relevant quiz content without any interruptions, contributing to a more 
                    engaging and enjoyable quiz-taking experience.
                </p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <h3>3. Theme</h3>
                <p>
                    At mindQuiz, we employ a consistent and visually appealing theme to enhance 
                    user experience and maintain brand identity.
                </p>
                <ul>
                    <li>
                        Our chosen theme predominantly features a soothing shade of blue, known 
                        for its calming and trustworthy qualities.
                    </li>
                    <li>
                        By also leveraging some of Bootstrap, we ensure that our theme is responsive, 
                        adaptable, and accessible across various devices.
                    </li>
                    <li>
                        For our login and register form we use Bootstrap's components and grid system which allows us to maintain 
                        a consistent layout and design.
                    </li>
                    <li>
                        The blue color palette adds a distinctive and memorable touch to our brand, 
                        reinforcing our commitment to quality and user satisfaction.
                    </li>
                </ul>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <h3>4. New Library Usage</h3>
                <p>
                    At mindQuiz, I've incorporated the powerful Chart.js library to enhance 
                    the visual representation of your performance. After completing a quiz, you 
                    can view a dynamic pie chart generated using Chart.js.
                </p>
                <ul>
                    <li>
                        This pie chart offers an insightful visualization of your performance,
                        showcasing the number of questions you answered correctly versus incorrectly.
                    </li>
                    <li>
                        Alongside the chart, your score is prominently displayed, offering a 
                        comprehensive summary of your quiz experience.
                    </li>
                    
                </ul>
            </div>
        </div>


        <hr>

        <div class="row">
            <div class="col-md-6">
                <h3>5. Javascript Usage</h3>
                <p>
                    JavaScript plays a crucial role in enhancing your experience on my platform. 
                    I utilize JavaScript to implement dynamic functionality such as:
                    <ul>
                        <li>Hiding and displaying the menu toggle to optimize screen space and improve navigation.</li>
                        <li>Implementing footer pagination for better navigation through tables.</li>
                    </ul>
                    
                </p>
            </div>
        </div>


        <hr>

        <!-- Membership Area -->
        <div class="row">
            <div class="col-md-6">
                <h3>6. Membership Area</h3>
                <p>
                    My Membership Area is an exclusive section of the site, accessible only to 
                    registered and logged-in users. Within this dedicated space, you can enjoy a 
                    personalized experience with a range of unique features and functionalities:
                    <ul>
                        <li>Creation of Custom Quizzes: You have the ability to create your own 
                            categories, questions, and answers, allowing for a tailored quiz-taking 
                            experience.</li>
                        <li>User Profile Management: You can easily update and customize your 
                            profile, including editing your username and password, ensuring 
                            security and personalization.</li>
                        <li>Performance Visualization: With the integration of Chart.js, you can 
                            visualize your quiz performance through an interactive pie chart. This 
                            feature provides a clear and insightful breakdown of correct and 
                            incorrect answers, aiding you in understanding your strengths and 
                            areas for improvement.</li>
                    </ul>
                </p>
            </div>
        </div>


    </div>

    <!-- footer -->

    <?php include(ROOT_PATH . "/app/headers/footer.php");?>

    <!-- End footer -->
</body>
</html>
