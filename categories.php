<?php 
include("path.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
include(ROOT_PATH . "/app/controllers/categories.php");
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

    <div class="menu">
        
        <ul class="navigation">
            <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home</a></li>
            <?php if (isset(($_SESSION['id']))): ?>
                <li><a href="<?php echo BASE_URL . "/mycategories.php" ?>">My categories</a></li>
            <?php endif; ?>
            
            
            
        </ul>

    </div>

    <!-- page-container -->
    <div class="page-container">
        
        <!-- content -->
        <div class="question-content">
            <h1>Categories</h1>
            
            <form action="<?php echo BASE_URL . '/questions.php'; ?>" method="GET">
                <div class="form-group">
                    <label for="category_id">Select Category:</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Select a category</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Get Questions</button>
            </form>
            
        </div>
        <!-- End content -->
    </div>
    <!-- page-container -->

    <!-- footer -->
    <?php include(ROOT_PATH . "/app/headers/footer.php");?>

    <!-- End footer -->
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    

    <script>
    $(document).ready(function(){
        
        $.ajax({
            url: 'categoriesAjax.php', 
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                
                if(data && data.trivia_categories) {
                    var categories = data.trivia_categories;
                    var select = $('#category_id');
                    
                    select.append('<option value="" selected>Select a category</option>');
                    $.each(categories, function(index, category) {
                        select.append('<option value="' + category.id + '">' + category.name + '</option>');
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching categories:', error);
            }
        });
    });
    </script>

</body>

</html>