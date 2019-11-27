
<head>
    <script>
    /*
User Story: I can start a 25 minute pomodoro, and the timer will go off once 25 minutes has elapsed.
User Story: I can reset the clock for my next pomodoro.
User Story: I can customize the length of each pomodoro.*/

window.onload = function() {
  const tomato = document.getElementById("tomato");
  const tomatoP = document.getElementById("tomatoP");
  const start = document.getElementById("start");
  const winStatement = document.getElementById("winStatement");
  let timeText = document.getElementById("timeText");
  let time;
  let inputValue;
  let isBreak = false;


  timeText.value = 25;
  breakTime.value = 5;

  start.addEventListener("click", () => {
    start.disabled = true;
    inputValue = document.getElementById("timeText").value;
    startTimer();
  });

  reset.addEventListener("click", () => {
    start.disabled = false;
    clearInterval(countdown);
    if (inputValue < 1) {
      let seconds = inputValue * 60;
      if(seconds < 10){
        tomatoP.innerHTML = "0 " + ": 0" + seconds;
      }else if(seconds>=10){
        tomatoP.innerHTML = "0 " + ": " + seconds;
      }

    } else {
      tomatoP.innerHTML = inputValue + " : 0" + 0;
    }
  });  

  const startTimer = function() {
    let timeText = document.getElementById("timeText").value;
    time = timeText * 60;
    let minutes = Math.floor(time / 60);
    let seconds = time - minutes * 60;
    if (seconds < 10) {
      tomatoP.innerHTML = minutes + " : 0" + seconds;
    } else if (seconds >= 10) {
      tomatoP.innerHTML = minutes + " : " + seconds;
    }
    time--;
    countdown = 
    setInterval(function() {
      let minutes = Math.floor(time / 60);
      let seconds = time - minutes * 60;
      if (seconds < 10) {
        tomatoP.innerHTML = minutes + " : 0" + seconds;
        time--;
      } else if (seconds >= 10) {
        tomatoP.innerHTML = minutes + " : " + seconds;
        time--;
      }
      if (time == -1 && isBreak == false) {
        winStatement.innerHTML = 'Take a break!';
        time = breakTime.value*60;
        isBreak = true;
      }
      else if (time == -1 && isBreak == true) {
        winStatement.innerHTML = "Back to work!";
        time = inputValue*60;
        isBreak = false;
      }
    }, 1000);
  };
};
</script>

</head>

<body>
    <div id='buttonDiv'>
        <button id='start'>START</button>
        <input type='text' placeholder='25' id='timeText'>
        <input type='text' placeholder='5' id='breakTime'>
        <button id='reset'>STOP</button>
        <p id='work'>Timer Length (Min)</p>
        <p id='break'>Break Length (Min)</p>
    </div>
    <div id='container'>
        <div id='tomato'>
            <p id='tomatoP'>25 : 00</p>
        </div>
    </div>
    <div id="winStatementDiv">
        <p id='winStatement'></p>
    </div>
</body>