<script>
    function populate() {
        if (quiz.isEnded()) {
            showScores();
        }
        // show question
        else {
            var element = document.getElementById("question");
            element.innerHTML = quiz.getQuestionIndex().text;

            // show options
            var choices = quiz.getQuestionIndex().choices;
            for (var i = 0; i < choices.length; i++) {
                var element = document.getElementById("choice" + i);
                element.innerHTML = choices[i];
                guess("btn" + i, choices[i]);
            }
            showProgress();
        }
    };

    function guess(id, guess) {
        var button = document.getElementById(id);
        button.onclick = function () {
            quiz.guess(guess);
            populate();
        }
    };

    function showProgress() {
        var currentQuestionNumber = quiz.questionIndex + 1;
        var element = document.getElementById("progress");
        element.innerHTML = "Question " + currentQuestionNumber + " of " + quiz.questions.length;
    };

    function showScores() {
        var gameOverHTML = "<h1>Result</h1>";
        gameOverHTML += "<h2 id='score'> Your scores: " + quiz.score + "</h2>";
        gameOverHTML += "You have made " + quiz.score + " correct answers out of " + quiz.questions.length + " questions";
        if (seconds < 0 && seconds > -5) {
            gameOverHTML += "<h2 > You were " + -seconds + " Seconds late than assigned time</h2>";
            gameOverHTML += "Hope you will try to improve Next Time!!";
        } else if (seconds < -5 && seconds > -10) {
            gameOverHTML += "<h2 > You were " + -seconds + " Seconds late than assigned time</h2>";
            gameOverHTML += "You Must improve your speed!!";
        } else if (seconds < -10) {
            gameOverHTML += "<h2 > You were " + -seconds + " Seconds late than assigned time</h2>";
            gameOverHTML += "Your are being too late!!";
        } else {
            gameOverHTML += "<h3 > You use " + seconds + " Seconds</h3>";
            gameOverHTML += "Congratulation!!<br> You have made on time!!";
        }
        gameOverHTML += "<br><a href='index.php?page=<?=$title;?>'style='color:darkgreen;'>Try again</a>"
        var element = document.getElementById("quiz");
        element.innerHTML = gameOverHTML;
    };

    // create questions
    <?php
    $query = "SELECT * FROM $title ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
    ?>
    var questions = [
        <?php foreach ($result as $key => $value) : ?>
        new Question("<?=$value['question'];?>",
            [<?php
                $options = $value['options'];
                $choice = explode(';', $options);
                for ($i = 0; $i < count($choice); $i++) {
                    echo "'" . $choice[$i] . "'" . ",";
                }
                ?>],
            "<?=$value['answer']?>")
        <?php echo ","?>
        <?php endforeach; ?>
    ];

    // create quiz
    var quiz = new Quiz(questions);

    // display quiz
    populate();
</script>

