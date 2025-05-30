<?php include("path.php");
include(ROOT_PATH . "/app/database/db.php");

$selected_category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;

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
    <!-- Header and menu in the holds/menu file -->
    
    <?php include(ROOT_PATH . "/app/headers/head.php");?>
    <div class="menu">
       
        <ul class="navigation">
            <?php if (isset(($_SESSION['id']))): ?>         
                    <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL . '/mycategories.php' ?>">My Categories</a></li>
            <?php else: ?>        
                    <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL . '/categories.php' ?>">Categories</a></li>
                    
            <?php endif; ?>
            
        </ul>   

    </div>

    <!-- page-container -->
    <div class="page-container">
        
        <!-- content -->
        <h3>Questions</h3>
        <div class="question-content">
            
            <div class="form-group">
                <p id="questionText" ></p>
            </div>
            <form id="questionForm">
                <div class="form-group">
                    <label for="choice1"><input type="radio" id="choice1" name="answer" value="0" disabled> <span id="labelChoice1"></span></label>
                </div>
                <div class="form-group">
                    <label for="choice2"><input type="radio" id="choice2" name="answer" value="1" disabled> <span id="labelChoice2"></span></label>
                </div>
                <div class="form-group">
                    <label for="choice3"><input type="radio" id="choice3" name="answer" value="2" disabled> <span id="labelChoice3"></span></label>
                </div>
                <div class="form-group">
                    <label for="choice4"><input type="radio" id="choice4" name="answer" value="3" disabled> <span id="labelChoice4"></span></label>
                </div>



                <button type="button" id="nextQuestion" class="btn btn-primary">Next</button>
            </form>
            <div id="result" style="display: none;">
                <h2>Quiz Results</h2>
                <p>Total questions: <span id="totalQuestions"></span></p>
                <p>Correct answers: <span id="correctAnswers"></span></p>
            </div>
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
        var questions = []; 
        var currentIndex = 0; 
        var correctAnswers = 0; 

        function decodeHTMLEntities(text) {
            var txt = document.createElement("textarea");
            txt.innerHTML = text;
            return txt.value;
        }

        function loadNextQuestion() {
            if (currentIndex < questions.length) {
                var currentQuestion = questions[currentIndex];

                var questionText = 'Question ' + (currentIndex + 1) + ': ' + decodeHTMLEntities(currentQuestion.question);

                $('#questionText').text(questionText);

                for (var i = 0; i < currentQuestion.choices.length; i++) {
                    $('#labelChoice' + (i+1)).text(currentQuestion.choices[i]);
                    $('#choice' + (i+1)).prop('disabled', false);
                    $('#choice' + (i+1)).prop('checked', false);
                }
            } else {
                showResults();
            }
        }

        function showResults() {
            $('#questionForm').hide();
            $('#questionText').hide();           // Hide question text
            $('#result').show();
            $('#totalQuestions').text(questions.length);
            $('#correctAnswers').text(correctAnswers);
        }
 
        $.ajax({
            url: 'questionsAjax.php',
            type: 'GET',
            data: { category_id: '<?php echo $selected_category_id; ?>' },  
            dataType: 'json',
            success: function(data) {
                questions = data.results.map(function(question) {
                    let allAnswers = [...question.incorrect_answers, question.correct_answer];
                    allAnswers = allAnswers.sort(() => 0.5 - Math.random());

                    return {
                        question: question.question,
                        choices: allAnswers,
                        correct_answer: allAnswers.indexOf(question.correct_answer)
                    };
                });
                loadNextQuestion();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching questions:', error);
            }
        });
        

        $('#nextQuestion').click(function() {
            var selectedAnswer = $('input[name=answer]:checked').val();
            if (selectedAnswer !== undefined) {
                selectedAnswer = parseInt(selectedAnswer); // convert to number
                if (selectedAnswer === questions[currentIndex].correct_answer) {
                    correctAnswers++;
                }
                currentIndex++;
                loadNextQuestion();
            } else {
                alert('Please select an answer.');
            }
            return false; 
        });
    });
    </script>



    <script src="src/js/script.js"></script>
</body>

</html>