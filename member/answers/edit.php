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

    <title>Member - Edit categories</title>
</head>
<body>

    <?php include(ROOT_PATH . "/app/headers/header.php"); ?>

    <div class="member-container">
        
        <?php include(ROOT_PATH . "/app/headers/sidebar.php"); ?>

        <div class="member-content">

            <div class="content">
                <h2 class="member-post-title">Edit Answer</h2>

                <form action="edit.php" method="post" class="form-publish">

                    <?php include(ROOT_PATH . "/app/messages/formErrors.php"); ?>

                    
                    <input type="hidden" name="question_id" value="<?php echo $question_id; ?>">

                    <div>
                        <label>Select Category</label>
                        <select name="category_id" class="input-label" id="category-select">
                            <option value="">Select a category</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $category_id) echo 'selected'; ?>><?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    
                    <div>
                        <label>Select Question</label>
                        <select name="question_id" class="input-label" id="question-select">
                            <option value="">Select a question</option>
                            
                        </select>
                    </div>

                    <div class="answer-choice">
                        <label>Answer Choices</label>
                        <?php foreach ($answers as $answer) : ?>
                            <div class="answer-choice">
                                <input type="text" name="answer_text[]" placeholder="Choice <?php echo htmlspecialchars($answer['option_letter']); ?>" class="input-label" value="<?php echo htmlspecialchars($answer['answer_text']); ?>">
                                <input type="radio" name="is_correct" value="<?php echo htmlspecialchars($answer['option_letter']); ?>" <?php if ($answer['is_correct'] == 1) echo 'checked'; ?>> Correct
                                <a href="edit.php?del_id=<?php echo $answer['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        <?php endforeach; ?>
                    </div>


                    <div>
                        <button type="submit" name="edit-answer" class="btn primary-btn">Update Answer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
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

<!-- <script src="../../src/js/memberScript.js"></script> -->

</body>

</html>