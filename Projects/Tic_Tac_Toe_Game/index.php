<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tic Tac Toe</title>
    <link rel="stylesheet" href="styles.css">
    <!--<script src="main.js"></script>-->
    <link href="https://fonts.googleapis.com/css?family=Skranji" rel="stylesheet"> 
    <script>
        window.onload = function() {
  const ticTacs = document.getElementsByClassName("ticTacs");
  const btnsXOrO = document.getElementsByClassName("btnsXOrO");
  const btnX = document.getElementById("btnX");
  const btnO = document.getElementById("btnO");
  const topRowBtns = document.getElementById("topRowBtns");
  const btns1Or2 = document.getElementsByClassName("btns1Or2");
  const scores = document.getElementById("scoreDiv");
  const newGameBtn = document.getElementById("newGame");
  const resetBtn = document.getElementById("reset");

  const playerScoreP = scores.getElementsByTagName("span")[0];
  const computerScoreP = scores.getElementsByTagName("span")[1];

  let playerWins = 0;
  let computerWins = 0;
  let nextMove = "win1";
  let gameOver = false;
  let box = 1;

  newGameBtn.addEventListener("click", () => {
    game();
  });

  resetBtn.addEventListener("click", () => {
    location.reload();
  });

  const player = {
    name: "player",
    selector: "",
    turn: "",
    win1: 0,
    win2: 0,
    win3: 0,
    win4: 0,
    win5: 0,
    win6: 1,
    win7: 0,
    win8: 0
  };

  const computer = {
    name: "computer",
    selector: "",
    turn: "",
    win1: 0,
    win2: 0,
    win3: 0,
    win4: 0,
    win5: 0,
    win6: 0,
    win7: 0,
    win8: 0
  };

  const xOrO = function(player, computer) {
    for (var i = 0; i < btnsXOrO.length; i++) {
      let btnsXOrORef = btnsXOrO[i];

      btnsXOrORef.addEventListener("click", () => {
        player.selector = btnsXOrORef.innerHTML;

        if (player.selector == "X") {
          computer.selector = "O";
        } else {
          computer.selector = "X";
        }

        topRowBtns.removeChild(btnX);
        topRowBtns.removeChild(btnO);
        chooseTurn(player, computer);
      });
    }
  };

  const chooseTurn = function(player, computer) {
    const firstPlayerBtn = document.createElement("button");
    const secondPlayerBtn = document.createElement("button");

    firstPlayerBtn.className = "btns1Or2";
    secondPlayerBtn.className = "btns1Or2";
    firstPlayerBtn.id = "btn1";
    secondPlayerBtn.id = "btn2";
    firstPlayerBtn.innerHTML = "1st Player";
    secondPlayerBtn.innerHTML = "2nd Player";

    topRowBtns.appendChild(firstPlayerBtn);
    topRowBtns.appendChild(secondPlayerBtn);

    for (var i = 0; i < btns1Or2.length; i++) {
      let btns1Or2Ref = btns1Or2[i];

      btns1Or2Ref.addEventListener("click", () => {
        player.turn = btns1Or2Ref.innerHTML;
        if (player.turn == "1st Player") {
          computer.turn = "2nd Player";
        } else {
          computer.turn = "1st Player";
          computerMove(player, computer);
        }

        topRowBtns.removeChild(firstPlayerBtn);
        topRowBtns.removeChild(secondPlayerBtn);

        let p1 = document.createElement("p");
        let p2 = document.createElement("p");
        p1.textContent = "Player is: " + player.selector;
        p2.textContent = "Computer is: " + computer.selector;
        p1.className = "selected";
        p2.className = "selected";
        p1.id = "playerIs";
        p2.id = "computerIs";

        topRowBtns.appendChild(p1);
        topRowBtns.appendChild(p2);

        gameStart(player, computer);
      });
    }
  };

  const gameStart = function(player, computer) {
    for (var i = 0; i < ticTacs.length; i++) {
      let ticTacRef = ticTacs[i];
      ticTacRef.addEventListener("click", () => {
        if (ticTacRef.getElementsByTagName("p")[0].innerHTML == "") {
          if (player.selector == "O" && gameOver == false) {
            ticTacRef.getElementsByTagName("p")[0].innerHTML = "O";
          } else if (player.selector == "X" && gameOver == false) {
            ticTacRef.getElementsByTagName("p")[0].innerHTML = "X";
          }
          let key = ticTacRef.className.split(" ");
          for (let i = 1; i < key.length; i++) {
            player[key[i]]++;
          }
          checkForWin(player);
          computerMove(player, computer);
        }
      });
    }
  };

  const computerMove = function(player, computer) {
    if (gameOver == false) {
      let biggest = 0;
      for (key in player) {
        total = player[key] + computer[key];
        if (player[key] > biggest && total <3) {
          biggest = player[key];
          nextMove = key;
        }
      }
    }
    console.log(nextMove);
    let nextMoves = document.getElementsByClassName(nextMove);

    for (let i = 0; i < nextMoves.length; i++) {
      nextMoveRef = nextMoves[i];
      if (nextMoveRef.getElementsByTagName("p")[0].innerHTML == "") {
        nextMoveRef.getElementsByTagName("p")[0].innerHTML = computer.selector;
        let key = nextMoveRef.className.split(" ");
        for (let i = 1; i < key.length; i++) {
          computer[key[i]]++;
        }
        checkForWin(computer);
        break;
      } else {
      }
    }
  };

  const checkForWin = function(beingChecked) {
    if (gameOver == false) {
      for (value in beingChecked) {
        if (beingChecked[value] == 3) {
          displayWinner(beingChecked);
        }
      }
    }
  };

  const displayWinner = function(winner) {
    console.log(winner.name + " is the winner");

    if (winner.name === "player") {
      playerWins++;
      gameOver = true;
    } else if (winner.name === "computer") {
      computerWins++;
      gameOver = true;
    }
    playerScoreP.textContent = playerWins;
    computerScoreP.textContent = computerWins;
  };

  const clear = function(object) {
    nextMove = "win1";
    biggest = 0;
    gameOver = false;
    box = 1;

    for (let key in object) {
      // console.log(key,object[key])
      if (typeof object[key] === "number") {
        object[key] = 0;
      }
      //   console.log(key,object[key])
    }
  };

  /**********************************************************************************/

  const game = function() {
    for (var i = 0; i < ticTacs.length; i++) {
      let ticTacRef = ticTacs[i];
      ticTacRef.getElementsByTagName("p")[0].innerHTML = "";
    }
    const object = {};
    clear(player);
    clear(computer);
    if (computer.turn == "1st Player") {
      computerMove(player, computer);
    }

    displayWinner(object);
    xOrO(player, computer);
  };

  /**********************************************************************************/

  game();
};

</script>
</head>

<body>
    <div class='btnContainer' id='topRowBtns'>
        <button class='btnsXOrO' id='btnX'>X</button>
        <button class='btnsXOrO' id='btnO'>O</button>
    </div>
    <div class='container'>
        <div class='ticTacs win1 win4 win7' id='1'>
            <p></p>
        </div>
        <div class='ticTacs win1 win5' id='2'>
            <p></p>
        </div>
        <div class='ticTacs win1 win6 win8' id='3'>
            <p></p>
        </div>
        <div class='ticTacs win2 win4' id='4'>
            <p></p>
        </div>
        <div class='ticTacs win2 win5 win7 win8' id='5'>
            <p></p>
        </div>
        <div class='ticTacs win2 win6' id='6'>
            <p></p>
        </div>
        <div class='ticTacs win3 win4 win8' id='7'>
            <p></p>
        </div>
        <div class='ticTacs win3 win5' id='8'>
            <p></p>
        </div>
        <div class='ticTacs win3 win6 win7' id='9'>
            <p></p>
        </div>
    </div>
    <div class='score' id='scoreDiv'>
        <p id='playerP'>Player score is: </p><span id='playerSpan' class='span'></span>
        <p id='computerP'>Computer score is: </p><span id='computerSpan' class='span'></span>
    </div>
    <div class='btnContainer2' id='bottomRowBtns'>
        <button id='newGame'>New Game!</button>
        <button id='reset'>Reset</button>
    </div>
</body>

</html>