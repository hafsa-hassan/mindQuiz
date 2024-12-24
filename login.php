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
    <link rel="stylesheet" href="src/css/style.css">
    <title>Login</title>
</head>

<body class="bg-pattern">

    <form method="POST" action="login.php">
        <div class="register-container">

            <h1 class="re-title">Login</h1>

            <?php include(ROOT_PATH . "/app/messages/formErrors.php"); ?>

            <div>
                <div>
                    <label>Username</label>
                    <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" class="input-label">
                </div>
            </div>

            <div>
                <div>
                    <label>Password</label>
                    <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" class="input-label">
                </div>
            </div>

            <div>
                <div>
                    <button type="submit" name="login-btn" class="register-submit">Submit</button>
                </div>
            </div>

            <div>
                <div>
                    <span>Do not have an account?<a href="<?php echo BASE_URL . '/register.php' ?>" class="signin">Signup</a></span>
                </div>
            </div>
        </div>
    </form>


</body>

</html>