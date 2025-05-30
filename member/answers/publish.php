<?php 
include("../../path.php"); 
include(ROOT_PATH . "/app/controllers/answers.php");


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

    <title>Member - publish answers</title>
</head>

<body>


    <?php include(ROOT_PATH . "/app/headers/header.php"); ?>


    <!-- member-container -->
    <div class="member-container">

        <?php include(ROOT_PATH . "/app/headers/sidebar.php"); ?>

        <!-- content -->
        <div class="member-content">

            <div class="content">
                <h2 class="member-post-title">Add answers</h2>
                <form action="publish.php" method="post" class="form-publish" >
                    
                    <?php include(ROOT_PATH . "/app/messages/formErrors.php"); ?>

                    <div>
                        <label>Select Category</label>
                        <select name="category_id" class="input-label" id="category-select">
                            <option value="">Select a category</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    
                    <div>
                        <label>Select Question</label>
                        <select name="question_id" class="input-label" id="question-select">
                            <option value="">Select a question</option>
                            
                        </select>
                    
                        <label>Answer Choices</label>
                        
                        
                        <div class="answer-choice">
                            <input type="text" name="answer_text[]" placeholder="Choice A" class="input-label" value="<?php echo isset($answer_text[0]) ? $answer_text[0] : ''; ?>">
                            <input type="radio" name="is_correct" value="A"> Correct
                        </div>
                        
                        
                        <div class="answer-choice">
                            <input type="text" name="answer_text[]" placeholder="Choice B" class="input-label" value="<?php echo isset($answer_text[1]) ? $answer_text[1] : ''; ?>">
                            <input type="radio" name="is_correct" value="B"> Correct
                        </div>
                        
                        
                        <div class="answer-choice">
                            <input type="text" name="answer_text[]" placeholder="Choice C" class="input-label" value="<?php echo isset($answer_text[2]) ? $answer_text[2] : ''; ?>">
                            <input type="radio" name="is_correct" value="C"> Correct
                        </div>
                        
                        
                        <div class="answer-choice">
                            <input type="text" name="answer_text[]" placeholder="Choice D" class="input-label" value="<?php echo isset($answer_text[3]) ? $answer_text[3] : ''; ?>">
                            <input type="radio" name="is_correct" value="D"> Correct
                        </div>
                    
                        <div>
                            <button type="submit" name="add-answer" class="btn primary-btn">Publish Answer</button>
                        </div>
                </form>

            </div>

        </div>

        <!-- End main-content -->

    </div>
    <!-- End member-container -->
        <script>
            document.getElementById('category-select').addEventListener('change', function() {
                var category_id = this.value;
                fetchQuestionsByCategory(category_id);
            });

            function fetchQuestionsByCategory(category_id) {
                fetch(`ajaxQuestions.php?category_id=${category_id}`)
                    .then(response => response.json())
                    .then(data => {
                        var questionSelect = document.getElementById('question-select');
                        questionSelect.innerHTML = ''; 

                        data.forEach(question => {
                            var option = document.createElement('option');
                            option.value = question.id;
                            option.text = question.question_text;
                            questionSelect.appendChild(option);
                        });
                    });
            }
        </script>

<script src="../../src/js/memberScript.js"></script>

</body>

</html>