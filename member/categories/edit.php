<?php 
include("../../path.php"); 
include(ROOT_PATH . "/app/controllers/categories.php");

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

    <title>Member - edit categories</title>
</head>

<body>


    <?php include(ROOT_PATH . "/app/headers/header.php"); ?>


    <!-- member-container -->
    <div class="member-container">

        <?php include(ROOT_PATH . "/app/headers/sidebar.php"); ?>


        <!-- content -->
        <div class="member-content">

            <div class="content">
                <h2 class="member-post-title">Edit categories</h2>
                

                <form method="post" action="edit.php" class="form-publish">

                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div>
                        <label>Category</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" class="input-label">
                    </div>

                    <div>
                        <button type="submit" name="update-category" class="btn primary-btn">Update category</button>
                    </div>

                </form>
            </div>

        </div>

        <!-- End main-content -->

    </div>
    <!-- End member-container -->

<script src="../../src/js/memberScript.js"></script>

</body>

</html>