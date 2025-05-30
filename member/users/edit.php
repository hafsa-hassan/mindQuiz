<?php 
include("../../path.php"); 
include(ROOT_PATH . "/app/controllers/users.php");

userOnly();
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
                            <h2 class="admin-post-title">Edit User</h2>
                <?php include(ROOT_PATH . "/app/messages/formErrors.php"); ?>

                <form method="post" action="edit.php" class="form-publish" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div>
                        <label>Firstname</label>
                        <input type="text" placeholder="Firstname" name="firstname" value="<?php echo $firstname; ?>" class="input-label">
                    </div>

                    <div>
                        <label>Lastname</label>
                        <input type="text" placeholder="Lastname" name="lastname" value="<?php echo $lastname; ?>" class="input-label">
                    </div>

                    <div>
                        <label>Username</label>
                        <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" class="input-label">
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" class="input-label">
                    </div>

                    <div>
                        <label>Password</label>
                        <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" class="input-label">
                    </div>

                    <div>
                        <label>Re-type Password</label>
                        <input type="password" placeholder="Re-type Password" name="repassword" value="<?php echo $repassword; ?>" class="input-label">
                    </div>


                    <div>
                        <button type="submit" name="update-user" class="btn primary-btn">Update User</button>
                    </div>

                </form>
            </div>
        </div>
            <!-- End member-content -->
    </div>

    <!-- End member-container -->

<script src="../../src/js/memberScript.js"></script>

</body>

</html>