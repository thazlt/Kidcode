

const questionNumber = document.querySelector(".question-number");
const questionText = document.querySelector(".question-text");
const optionContainer = document.querySelector(".option-container");
const answersIndicatorContainer = document.querySelector(".answer-indicator")
const homeBox = document.querySelector(".home-box");
const quizBox = document.querySelector(".quiz-box");
const resultBox = document.querySelector(".result-box");

let questionCounter = 0;
let currentQuestion;
let availableQuestions = [];
let availableOptions = [];
let correctAnswer = 0;
let attempt = 0;

//đưa questions vào mảng availableQuestions
function setAvailableQuestions(){
    const totalQuestion = quiz.length;
    for (let i=0; i<totalQuestion; i++){
        availableQuestions.push(quiz[i])
    }
}

//Làm mới lại question number & question & option
function getNewQuestion(){
    //set question number
    questionNumber.innerHTML = "Question " + (questionCounter + 1) + " of " + quiz.length;
    //set question text
    //get random question
    const questionIndex = availableQuestions[Math.floor(Math.random() * availableQuestions.length)]
         //console.log(questionIndex)
    currentQuestion = questionIndex;
    questionText.innerHTML = currentQuestion.q;
    //lấy vị trí của phần tử questionindex trong mảng available question
    const index1= availableQuestions.indexOf(questionIndex);
    //xóa questionIndex trong mang availableQuestion để k bị trùng lặp câu hỏi
    availableQuestions.splice(index1,1);
        // console.log(index1)
        // console.log(questionIndex)

        //set options
        //lấy chiều dài của options
        const optionLength = currentQuestion.option.length
        //push options vao trong mang  availableOptions 
        for (let i=0; i<optionLength; i++){
            availableOptions.push(i)
        }

        //Làm mới lại trang option
        optionContainer.innerHTML = '';

        let animationDelay = 0.15;
        //create optons in html
        for (let i=0; i<optionLength;i++){
            const optionIndex = availableOptions[Math.floor(Math.random() * availableOptions.length)]
            //get the position of optionIndex from the availableOptions
            const index2 = availableOptions.indexOf(optionIndex);
            //XOA optionIndex de k bi lap lai
            availableOptions.splice(index2,1);
            const option = document.createElement("div");
            option.innerHTML = currentQuestion.option[optionIndex];
            option.id = optionIndex;
            option.style.animationDelay = animationDelay + 's';
            animationDelay = animationDelay + 0.15;
            option.className = "option";
            optionContainer.appendChild(option)
            option.setAttribute("onclick","getResult(this)");
        }
    questionCounter++

}

//get the result of current attemp question
function getResult(element){
    const id = parseInt(element.id);
    //get the answer by comparing the id of clicked option
    if (id === currentQuestion.answer) {
        // console.log("answer is correct");
        //Đổi sang màu XANH LÁ nếu chọn đúng
        element.classList.add("correct");

        //Thêm kí hiệu đúng vào indicator
        updateAnswerIndicator("correct");
        correctAnswer++;

    }
    else {
        //Đổi sang màu ĐỎ nếu chọn sai
        // console.log("answer is wrong");
        element.classList.add("wrong");

        //Thêm kí hiệu sai vào indicator
        updateAnswerIndicator("wrong");

        //HIỆN ĐÁP ÁN ĐÚNG NẾU CHỌN SAI
        const optionLength = optionContainer.children.length;
        for (let i=0; i<optionLength; i++) {
            if (parseInt(optionContainer.children[i].id) === currentQuestion.answer){
                optionContainer.children[i].classList.add("correct");
            }
        }


    }
    attempt++;
    unclickableOptions();
}
//KHÔNG CHO USER THAY ĐỔI LỰA CHỌN
function unclickableOptions(){
    const optionLength = optionContainer.children.length;
    for(let i=0; i<optionLength; i++){
        optionContainer.children[i].classList.add("already-answered");
    }
}

function answersIndicator(){
    answersIndicatorContainer.innerHTML = '';
    const totalQuestion = quiz.length;
    for (let i=0;i<totalQuestion;i++){
        const indicator = document.createElement("div");
        answersIndicatorContainer.appendChild(indicator);
    }
}

function updateAnswerIndicator(markType){
    answersIndicatorContainer.children[questionCounter-1].classList.add(markType);
}
function next(){
    if(questionCounter === quiz.length){
        console.log("Quiz over");
        quizOver();
    }
    else getNewQuestion();
}

function quizOver(){
    //hide quiz quizBox
    quizBox.classList.add("hide");
    //show resultBox 
    resultBox.classList.remove("hide");
    quizResult();
}

function quizResult(){
    resultBox.querySelector(".total-question").innerHTML = quiz.length;
    resultBox.querySelector(".total-attempt").innerHTML = attempt;
    resultBox.querySelector(".total-correct").innerHTML = correctAnswer;
    resultBox.querySelector(".total-wrong").innerHTML = attempt - correctAnswer;
    const percentage = (correctAnswer/quiz.length)*100;
    resultBox.querySelector(".percentage").innerHTML = percentage.toFixed(2) + "%";
    resultBox.querySelector(".total-score").innerHTML = correctAnswer + " / " + quiz.length;
}

function resetQuiz(){
    questionCounter = 0;
    correctAnswer = 0;
    attempt = 0;
}

function tryAgainQuiz(){
    resultBox.classList.add("hide");
    quizBox.classList.remove("hide");
    resetQuiz();
    startQuiz();
}

//###QUAY VE TRANG CHU KIDCODE ####
function goToHome(){
    resultBox.classList.add("hide");
    homeBox.classList.remove("hide");
    resetQuiz();
}

// ####BAT DAU ###

function startQuiz(){
    homeBox.classList.add("hide");
    quizBox.classList.remove("hide");
    //Dua het questions vao trong mang availableQuestions
    setAvailableQuestions();
    //Goi ham getNewQuestion
    getNewQuestion();
    //HIện thị đáp án đúng sai
    answersIndicator();
}




