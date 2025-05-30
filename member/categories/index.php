<?php 
include("../../path.php"); 
include(ROOT_PATH . "/app/controllers/categories.php");

userOnly();

foreach ($categories as &$category) {
    $category['questions_count'] = count(selectAll('questions', ['category_id' => $category['id']]));
}


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

    <title>Member - publish categories</title>
</head>

<body>


    <?php include(ROOT_PATH . "/app/headers/header.php"); ?>


    <!-- member-container -->
    <div class="member-container">

        <?php include(ROOT_PATH . "/app/headers/sidebar.php"); ?>


        <!-- content -->
        <div class="member-content">

            <h3 class="member-page-title">categories</h3>
            <hr>

            <div class="member-page-manage">
                <div class="btn-manage">
                    <a href="publish.php" type="button" class="btn primary-btn">
                        <i class="bi bi-file-plus"></i>
                        Add categories
                    </a>
                </div>
            </div>

            <div class="member-table overflow-x-auto">
            <h3 class="member-post-title">Manage Categories</h3>

            <?php include(ROOT_PATH . "/app/headers/messages.php"); ?>

            <div class="table-container">

                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Categories</th>
                            <th>No. questions</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($categories as $key => $cate) :?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $cate['name']; ?></td>
                                <td><?php echo $cate['questions_count']; ?></td>
                                <td><a href="edit.php?id=<?php echo $cate['id']; ?>" class="action-link" style="color: green;">Edit</a></td>
                                <td><a href="index.php?del_id=<?php echo $cate['id']; ?>" class="action-link" style="color: red;">Delete</a></td>
                            </tr>
                        <?php endforeach; ?>



                    </tbody>

                    <tfoot>
                        <td colspan="5">
                            <div class="pagination">
                                <button class="move-btn" id="prev"> < Prev </button>

                                <div class="page-number"></div>

                                <button class="move-btn" id="next"> Next > </button>
                            </div>
                            
                            
                        </td>
                    </tfoot>
                </table>
            </div>
            

        </div>
            </div>

        </div>

        <!-- End main-content -->

    </div>
    <!-- End member-container -->

<script src="../../src/js/memberScript.js"></script>

</body>

</html>