<script>
    const quiz = [
      <?php foreach ($data["Questions"] as $ques) {
        echo "{q:'" . $ques['Question'] . "',";
        echo "option:['" . $ques['Ans1'] . "','" . $ques['Ans2'] . "','" . $ques['Ans3'] . "','" . $ques['Ans4'] . "'],";
        echo "answer:" . $ques['Correct_Ans'] . "},";
      } ?>
]
</script>


<?php
include APPROOT . '/resources/views/inc/header.blade.php';
 ?>
<div class="container-quiz">
    <div class="home-box custom-box">
        <h3>Instruction:</h3>
        <p>Total number of questions: <span class="total-question">
            <script>
                const homeBox1 = document.querySelector(".home-box");
                homeBox1.querySelector(".total-question").innerHTML = quiz.length;
                console.log(quiz.length);
            </script>
        </span></p>
        <button type="button" class="quiz_btn" onclick="startQuiz()">Start Quiz</button>
    </div>

    <div class="quiz-box custom-box hide">
        <div class="question-number">

        </div>
        <div class="question-text">

        </div>
        <div class="option-container">

        </div>
        <div class="next-question-btn">
            <button type="button" class="quiz_btn" onclick="next()">Next</button>
        </div>
        <div class="answer-indicator">

        </div>
    </div>
    <div class="result-box custom-box hide ">
        <h1>Quiz Result</h1>
        <table>
            <tr>
                <td>Total Question</td>
                <td><span class="total-question"></span></td>
            </tr>
            <tr>
                <td>Attempt</td>
                <td><span class="total-attempt"></span></td>
            </tr>
            <tr>
                <td>Correct</td>
                <td><span class="total-correct"></span></td>
            </tr>
            <tr>
                <td>Wrong</td>
                <td><span class="total-wrong"></span></td>
            </tr>
            <tr>
                <td>Percentage</td>
                <td><span class="percentage"></span></td>
            </tr>
            <tr>
                <td>Your Total Score</td>
                <td><span class="total-score"></span></td>
            </tr>
        </table>
        <button type="button" class="quiz_btn" onclick="tryAgainQuiz()">Try Again</button>
        <button type="button" class="quiz_btn" onclick="window.location.href='<?php echo URLROOT . 'lessons/index?lessonID='. $data['LessonID'];?>'">Go to Lesson</button>
    </div>
</div>
    <script src="<?php echo URLROOT; ?>resources/js/quiz.js"></script>
    <?php
    include APPROOT . '/resources/views/inc/footer.blade.php';
    ?>
