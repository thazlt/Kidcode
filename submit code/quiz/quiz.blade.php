<script>
    const quiz = [
{
    q:'This is question 1 ?',
    option:['Answer A','Answer B','Answer C','Answer D'],
    answer:2
},
{
    q:'This is question 2 ?',
    option:['Answer A','Answer B','Answer C','Answer D'],
    answer:2
},
{
    q:'This is question 3 ?',
    option:['Answer A','Answer B','Answer C','Answer D'],
    answer:3
},
{
    q:'This is question 4 ?',
    option:['Answer A','Answer B','Answer C','Answer D'],
    answer:3
},
{
    q:'This is question 5 ?',
    option:['Answer A','Answer B','Answer C','Answer D'],
    answer:3
}
]
</script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Quiz App</title>
</head>
<body>
    
    <div class="home-box custom-box">
        <h3>Instruction:</h3>
        <p>Total number of questions: <span class="total-question">
            <script>
                const homeBox1 = document.querySelector(".home-box");
                homeBox1.querySelector(".total-question").innerHTML = quiz.length;
                console.log(quiz.length);
            </script>
        </span></p>
        <button type="button" class="btn" onclick="startQuiz()">Start Quiz</button>
    </div>

    <div class="quiz-box custom-box hide">
        <div class="question-number">
        
        </div>
        <div class="question-text">
           
        </div>
        <div class="option-container">

        </div>
        <div class="next-question-btn">
            <button type="button" class="btn" onclick="next()">Next</button>
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
        <button type="button" class="btn" onclick="tryAgainQuiz()">Try Again</button>
        <button type="button" class="btn" onclick="goToHome()">Go to Home</button>
    </div>

    <script src="js/app.js"></script>
</body>
</html>