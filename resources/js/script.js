const testWrapper = document.querySelector('.text-wrapper');
const testArea = document.querySelector('#textArea');
const originText = document.querySelector('.text').innerHTML;
const resetButton = document.querySelector('#reset');
const theTimer = document.querySelector('.timer');
let inputtime = document.querySelector('#input-time');
let inputerror = document.querySelector('#input-error');
let errorcount = 0;

console.log(originText);
let temp = originText.replace(/<br>/g,'\n');
console.log(temp);
let timer = [0,0,0,0];
let interval;
let timerRunning = false;
//Add Leading zero to numbers 9
function leadingZero (time){
  if (time <= 9){
    time = "0" + time;
  }
  return time;
}

//Create a Clock
function runTimer(){
  let currentTime = leadingZero( timer[0]) + ":" + leadingZero(timer[1]) + ":" + leadingZero(timer[2]);
  theTimer.innerHTML = currentTime;
  timer[3]++;

  timer[0] = Math.floor((timer[3]/100)/60);
  timer[1] = Math.floor((timer[3]/100) - (timer[0] * 60));
  timer[2] = Math.floor(timer[3] - (timer[1] * 100) - (timer[0] * 6000));
}

//Reset Everything
function reset(){
  clearInterval (interval);
  interval = null;
  timer=[0,0,0,0];
  timerRunning = false;

  testArea.value ="";
  theTimer.innerHTML = "00:00:00";

  testWrapper.style.borderColor='orange';
}

//Match the text with provided text on the page
function spellCheck(){
  //let textEntered = String(testArea.value).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
  let textEntered = String(testArea.value);
  let originTextMatch = temp.substring(0,textEntered.length);

  if (textEntered == temp){
    testWrapper.style.borderColor = 'green';
    clearInterval(interval);
    inputtime.value=theTimer.innerHTML;
    inputerror.value = errorcount;

  } else {
    if(textEntered == originTextMatch){
      testWrapper.style.borderColor = 'orange';
    }
    else {
      testWrapper.style.borderColor = 'red';
      errorcount++;
    }
  }
}

//Start the Timer
function start(){
  let textEnteredLength = testArea.value.length;
  if (textEnteredLength === 0 ){
    timerRunning = true;
    interval = setInterval(runTimer,10);
  }
}

//Event Listener for keyboard input and Reset button Event
testArea.addEventListener('keypress',start,false);
testArea.addEventListener('keyup', spellCheck,false);
resetButton.addEventListener('click',reset,false);


