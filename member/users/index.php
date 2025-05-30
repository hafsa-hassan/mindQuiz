<?php 
include("../../path.php"); 
include(ROOT_PATH . "/app/controllers/users.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootsrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@500&display=swap" rel="stylesheet">

    <!-- Css stylesheet -->
    <link rel="stylesheet" href="../../src/css/memberStyle.css">

    <title>Member - publish User</title>
</head>

<body>


    <?php include(ROOT_PATH . "/app/headers/header.php"); ?>


    <!-- member-container -->
    <div class="member-container">

        <?php include(ROOT_PATH . "/app/headers/sidebar.php"); ?>


        <!-- content -->
        <div class="member-content">

            <h3 class="member-page-title">User</h3>
            <hr>

            <div class="member-table overflow-x-auto">
                <h3 class="member-post-title">Manage User</h3>

                <?php include(ROOT_PATH . "/app/headers/messages.php"); ?>

                <div class="container">

                    <div>
                        <label for="firstName" class="label-user">First Name:</label>
                        <div class="form-user">
                            <span id="firstName" ><?php echo $user['firstname']; ?></span>
                        </div>
                        
                    </div>

                    <div>
                        <label for="lastName" class="label-user">Last Name:</label>
                        <div class="form-user">
                            <span id="lastName"><?php echo $user['lastname']; ?></span>
                        </div>
                    </div>

                    <div>
                        <label for="username" class="label-user">Username:</label>
                        <div class="form-user">
                            <span id="username"><?php echo $user['username']; ?></span>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="label-user">Email:</label>
                        <div class="form-user">
                            <span id="username"><?php echo $user['email']; ?></span>
                    </div>
                    </div>

                    <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn primary-btn">Edit</a>
                </div>
            </div>

        </div>

        <!-- End main-content -->

    </div>
    <!-- End member-container -->

<script src="../../src/js/memberScript.js"></script>

</body>

</html>