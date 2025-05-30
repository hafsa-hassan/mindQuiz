<?php 
include("path.php");
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/messages/interware.php");
userOnly();

$user_id = $_SESSION['id'];

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    
    $questions = selectAll('questions', ['category_id' => $category_id]);
    $answers = selectAll('answers', ['category_id' => $category_id]);
}

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
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
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
                    <li><a href="<?php echo BASE_URL . '/categories.php' ?>">Categories</a></li>
                    <li><a href="<?php echo BASE_URL . '/mycategories.php' ?>">My Categories</a></li>
            <?php else: ?>        
                    <li><a href="<?php echo BASE_URL . '/home.php' ?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL . '/categories.php' ?>">Categories</a></li>
            <?php endif; ?>
        </ul>   
    </div>

    <div class="page-container">
        <div class="question-content">
            <div id="questions-container">
                <?php if (!empty($questions)): ?>
                    <?php foreach ($questions as $index => $question): ?>
                        <div class="question form-group" data-index="<?php echo $index; ?>" <?php if ($index !== 0) echo 'style="display:none;"'; ?>>
                            <h4><?php echo $question['question_text']; ?></h4>
                            <div class="answers form-group">
                                <?php foreach ($answers as $answer): ?>
                                    <?php if ($answer['question_id'] == $question['id']): ?>
                                        <div class="answer form-group">
                                            <input type="radio" name="question_<?php echo $index; ?>" value="<?php echo $answer['is_correct']; ?>">
                                            <?php echo $answer['answer_text']; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <button class="next-btn btn btn-primary">Next</button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <!-- Chart.js Canvas -->
            <canvas id="quizChart" width="40" height="20"></canvas>
            
            <!-- score -->
            <div id="score-container" style="display:none;">
                <h2>Your Score:</h2>
                <div id="score"></div>
            </div>
        </div>

        

    </div>

    <!-- Footer -->
    <?php include(ROOT_PATH . "/app/headers/footer.php");?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <script>
    $(document).ready(function() {
        let currentIndex = 0;
        let scores = 0;

        $(".question").hide(); 
        $(".question:first").show();

        $(".next-btn").click(function() {
            let selectedAnswer = $("input[name='question_" + currentIndex + "']:checked").val();
            
            if (selectedAnswer === undefined) {
                alert("Please select an answer.");
                return;
            }

            if (selectedAnswer == 1) {
                scores++;
            }

            $(".question[data-index='" + currentIndex + "']").hide();

            currentIndex++;

            if (currentIndex < <?php echo count($questions); ?>) {
                $(".question[data-index='" + currentIndex + "']").show();
            } else {
                let scorePercentage = (scores / <?php echo count($questions); ?>) * 100;
                $("#score").html(scorePercentage.toFixed(2) + "%");
                $("#score-container").show();

                // Create Chart.js chart
                createChart(scores, <?php echo count($questions); ?>);
            }
        });
    });

    function createChart(correctAnswers, totalQuestions) {
        var ctx = document.getElementById('quizChart').getContext('2d');
        var quizChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Correct Answers', 'Wrong Answers'],
                datasets: [{
                    label: 'Quiz Score',
                    data: [correctAnswers, totalQuestions - correctAnswers],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    }
    </script>

</body>

</html>
