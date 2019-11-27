    <head>
    <script>
        

window.onload = function() {
  const simonBtns = document.getElementsByClassName("simonBtns");
  const GRBtn = document.getElementById("GR");
  const REBtn = document.getElementById("RE");
  const BLBtn = document.getElementById("BL");
  const YEBtn = document.getElementById("YE");
  const container = document.getElementById("container");
  const start = document.getElementById("start");
  const strict = document.getElementById("strict");
  const reset = document.getElementById("reset");
  const winRounds = document.getElementById("winRounds");
  const winStatement = document.getElementById("winStatement");
  let step = 0;
  let testId = "";
  let orderArray = [];
  let timing = 500;
  let response = false;
  let round = 1;
  let isStrict = false;

  start.addEventListener("click", () => {
    winRounds.innerHTML = "0" + round;
    addAndPlay();
    start.disabled = true;
  });

  const resetFun = function() {
    step = 0;
    round = 1;
    winRounds.innerHTML = "0" + round;
    orderArray = [];
    winStatement.innerHTML = '';
    start.disabled = true;
    setTimeout(addAndPlay, 1000);
  };

  reset.addEventListener("click", () => {
    resetFun();
  });

  GRBtn.addEventListener("click", () => {
    var audio = new Audio(
      "https://s3.amazonaws.com/freecodecamp/simonSound1.mp3"
    );
    audio.play();
    GRBtn.style.backgroundColor = "#02c39a";
    setTimeout(function() {
      GRBtn.style.backgroundColor = "green";
    }, 0100);
    testId = GRBtn.id;
    testReponse(testId);
  });

  REBtn.addEventListener("click", () => {
    var audio = new Audio(
      "https://s3.amazonaws.com/freecodecamp/simonSound2.mp3"
    );
    audio.play();
    REBtn.style.backgroundColor = "#f4acb7";
    setTimeout(function() {
      REBtn.style.backgroundColor = "red";
    }, 0100);
    testId = REBtn.id;
    testReponse(testId);
  });

  BLBtn.addEventListener("click", () => {
    var audio = new Audio(
      "https://s3.amazonaws.com/freecodecamp/simonSound3.mp3"
    );
    audio.play();
    BLBtn.style.backgroundColor = "#39a0ed";
    setTimeout(function() {
      BLBtn.style.backgroundColor = "blue";
    }, 0100);
    testId = BLBtn.id;
    testReponse(testId);
  });

  YEBtn.addEventListener("click", () => {
    var audio = new Audio(
      "https://s3.amazonaws.com/freecodecamp/simonSound4.mp3"
    );
    audio.play();
    YEBtn.style.backgroundColor = "#999900";
    setTimeout(function() {
      YEBtn.style.backgroundColor = "yellow";
    }, 0100);
    testId = YEBtn.id;
    testReponse(testId);
  });

  strict.addEventListener("click", () => {
    if (isStrict == false) {
      strict.style.backgroundColor = "#755c1b";
      strict.style.border = "2px solid #400406";
      isStrict = true;
    } else if (isStrict == true) {
      strict.style.backgroundColor = "#d7be82";
      strict.style.border = "";
      isStrict = false;
    }
  });

  const addButton = function() {
    choiceNum = Math.floor(Math.random() * 4);
    switch (choiceNum) {
      case 0:
        orderArray.push("GR");
        break;
      case 1:
        orderArray.push("RE");
        break;
      case 2:
        orderArray.push("BL");
        break;
      case 3:
        orderArray.push("YE");
        break;
    }
  };

  const clickOn = function(current) {
    let currentId = current.id;
    current.className += "pressed";
    switch (currentId) {
      case "GR":
        current.click();
        break;
      case "RE":
        current.click();
        break;
      case "BL":
        current.click();
        break;
      case "YE":
        current.click();
        break;
    }
  };

  const changeBack = function(current, currentBackground) {
    current.style.backgroundColor = currentBackground;
  };

  const playBack = function() {
    orderArray.forEach(function(element, index) {
      setTimeout(function() {
        let current = document.getElementById(element);
        let currentId = current.id;
        current.className += "pressed";
        switch (currentId) {
          case "GR":
            var audio = new Audio(
              "https://s3.amazonaws.com/freecodecamp/simonSound1.mp3"
            );
            audio.play();
            GRBtn.style.backgroundColor = "#02c39a";
            setTimeout(function() {
              GRBtn.style.backgroundColor = "green";
            }, 0100);
            break;
          case "RE":
            var audio = new Audio(
              "https://s3.amazonaws.com/freecodecamp/simonSound2.mp3"
            );
            audio.play();
            REBtn.style.backgroundColor = "#f4acb7";
            setTimeout(function() {
              REBtn.style.backgroundColor = "red";
            }, 0100);
            break;
          case "BL":
            var audio = new Audio(
              "https://s3.amazonaws.com/freecodecamp/simonSound3.mp3"
            );
            audio.play();
            BLBtn.style.backgroundColor = "#39a0ed";
            setTimeout(function() {
              BLBtn.style.backgroundColor = "blue";
            }, 0100);
            break;
          case "YE":
            var audio = new Audio(
              "https://s3.amazonaws.com/freecodecamp/simonSound4.mp3"
            );
            audio.play();
            YEBtn.style.backgroundColor = "#999900";
            setTimeout(function() {
              YEBtn.style.backgroundColor = "yellow";
            }, 0100);
            break;
        }
      }, index * timing);
    });
  };

  const testReponse = function(id) {
    if (id == orderArray[step] && step !== orderArray.length - 1) {
      step++;
    } else if (id !== orderArray[step]) {
      if (isStrict == false) {
        clearNow();
        errorNoise();
        setTimeout(playBack, 1000);
      } else if (isStrict == true) {
        resetFun();

      }
    } else if (step == orderArray.length - 1 && id == orderArray[step]) {
      clearNow();

      round++;
      if (round > 0 && round < 9) {
        winRounds.innerHTML = "";
        winRounds.innerHTML = "0" + round;
      } else if (round > 0 && round > 9) {
        winRounds.innerHTML = "";
        winRounds.innerHTML = round;
      }

      if (round > 1 && round !== 20) {
        setTimeout(addAndPlay, 1500);
      } else if (round > 1 && round == 20) {
        winStatement.innerHTML = "You Win! - Game Reset in 6 Seconds";
        setTimeout(resetFun,6000);
      }
    }
  };

  const errorNoise = function() {
    var audio1 = new Audio(
      "https://s3.amazonaws.com/freecodecamp/simonSound1.mp3"
    );
    var audio2 = new Audio(
      "https://s3.amazonaws.com/freecodecamp/simonSound2.mp3"
    );
    var audio3 = new Audio(
      "https://s3.amazonaws.com/freecodecamp/simonSound3.mp3"
    );
    var audio4 = new Audio(
      "https://s3.amazonaws.com/freecodecamp/simonSound4.mp3"
    );
    audio1.play();
    audio2.play();
    audio3.play();
    audio4.play();
  };

  const clearTimer = function() {
    setTimeout(function() {
      step = 0;
    }, (orderArray.length + 1.5) * timing);
  };

  const clearNow = function() {
    setTimeout(function() {
      step = 0;
    }, 0000);
  };

  const addAndPlay = function() {
    clearNow();
    addButton();
    playBack();
  };
};

        </script>
</head>
    <body>
        
        <div id='buttonDiv'>
            <button id='start'>START</button>
            <button id='strict'></button>
            <button id='reset'>RESET</button>
        </div>
        <div>
            <p id='strictText'>STRICT</p>
        </div>
        <div id='container' class="container">
            <button style="background-color: green" class='simonBtns' id='GR'></button>
            <button style="background-color: red" class='simonBtns' id='RE'></button>
            <button style="background-color: blue" class='simonBtns' id='BL'></button>
            <button style="background-color: yellow" class='simonBtns' id='YE'></button>
        </div>
        <div id='winDiv'>
            <p id='winRounds'>00</p>
        </div>
        <div >
            <p id='winStatement'></p>
        </div>
    </body>
