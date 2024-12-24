<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/users.php");

guestsOnly();
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
    <title>register</title>
</head>

<body>

    
    <div class="register-container">

        <h1 class="re-title">Register</h1>


        <form method="POST" action="register.php" class="form-publish" enctype="multipart/form-data">

            <?php include(ROOT_PATH . "/app/messages/formErrors.php"); ?>

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
                <button type="submit" name="register-btn" class="register-submit">Submit</button>
            </div>
        
            <div>
                <span>Already Have an account?<a href="<?php echo BASE_URL . '/login.php' ?>" class="signin">Signin</a></span>
            </div>
        </form>   
    </div>
    


    <script src="src/js/script.js"></script>

</body>

</html>