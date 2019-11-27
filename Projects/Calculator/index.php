

<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
</head>
<script>
    window.onload = function() {

        /*
        To Do:
        Round decimals/sig figs - return Number.parseFloat(x).toPrecision(4);
        
        Future To Do:
        % function
        Keyboard support
        */

        // Here, I set all of my variables and allow the calling of displays, operators, some major buttons...

        const operators = document.getElementsByClassName('operator');
        const display = document.getElementById('display');
        const display2 = document.getElementById('display2');
        const number = document.getElementsByClassName('number');
        const clear = document.getElementById('CE');
        const equals = document.getElementById('equals');
        const sqrt = document.getElementById('sqrt');
        const backspace = document.getElementById('backspace');
        let math;
        let a;
        let b;
        let currentOpp;
        let shouldIClear = false;
        let textFull = false;
        let firstEqual = true;
        let operatorLast = false;
        let operatorAgain = false;
        let precision = 0;

        // Here I set some basic math functions.

        const add = function(a, b) {
            return a + b;
        }
        const subtract = function(a, b) {
            return a - b;
        }
        const multiply = function(a, b) {
            return a * b;
        }
        const divide = function(a, b) {

            return a / b;
        }
        const sqrtFun = function(a) {
            return Math.sqrt(a);
        }
        const operate = function(opp, a, b) {
            switch (opp) {
                case '+':
                    return add(a, b)
                    break;
                case '-':
                    return subtract(a, b)
                    break;
                case '*':
                    return multiply(a, b)
                    break;
                case '/':
                    return divide(a, b)
                    break;
                default:
            }
        }

        // This is used to clear the variables used for math, the displays, and some limiting paramters.

        const clearMe = function() {
            a = '';
            b = '';
            display.textContent = '';
            display2.textContent = '';
            textFull = false;
            currentOpp = '';
            // location.reload();

        }

        // Here I establish how the operators behave.

        for (var i = 0; i < operators.length; i++) {
            let operatorsRef = operators[i];
            operatorsRef.addEventListener('click', () => {
                previousOpp = currentOpp;
                currentOpp = operatorsRef.innerHTML;
                if (display.textContent !== '' && operatorLast != true) {
                    currentOpp = operatorsRef.innerHTML;
                    if (operatorAgain == true) {
                        b = parseFloat(display.textContent, 10);
                        display.textContent = ' ';
                        a = operate(previousOpp, a, b);
                        display2.textContent = a + currentOpp;
                        operatorAgain = true;
                        firstEqual = true;
                        operatorLast = true;
                    } else if (operatorAgain == false) {
                        a = parseFloat(display.textContent, 10);
                        operatorLast = true;
                        firstEqual = true;
                        a = parseFloat(display.textContent, 10)
                        display.textContent = '';
                        display2.textContent = a;
                        display2.textContent += currentOpp;
                        textFull = false;
                        operatorAgain = true;
                    }
                }
            });
        };

        // Here is where the number actions are declared.

        for (var i = 0; i < number.length; i++) {
            let numberRef = number[i];
            numberRef.addEventListener('click', () => {
                if (display.textContent.length > 11 || numberRef.innerHTML == '.' && display.textContent.includes(
                        '.')) {
                    textFull = true;
                }
                if (textFull == false) {
                    operatorLast = false;
                    if (shouldIClear == true) {
                        display.textContent = '';
                        //display2.textContent = '';

                    }

                    firstEqual = true;
                    shouldIClear = false;
                    display.textContent += numberRef.innerHTML;
                }
            });
        };

        // This is the clear button declaration.

        clear.addEventListener('click', () => {
            clearMe();
        });

        // Equals function. This does different things depending if equals has been hit before in an attempt to re-run the same math (3+4+4+4+4...)

        equals.addEventListener('click', () => {
            if (display.textContent !== '' && a != '') {
                if (operatorLast == false) {
                    if (firstEqual == true) {
                        b = parseFloat(display.textContent, 10);
                        if (b == 0 || b === NaN || b == '') {
                            clearMe();
                            display.textContent = 'NO INFINITY';
                            shouldIClear = true;
                            operatorLast = true;
                        } else if (a != undefined) {
                            display.textContent = operate(currentOpp, a, b);
                            display2.textContent = a + currentOpp + b;
                            shouldIClear = true;
                            firstEqual = false;
                            operatorAgain = false;
                        }

                    } else if (firstEqual == false) {
                        a = parseFloat(display.textContent, 10);
                        if (b == 0 || b === NaN || b == '') {
                            clearMe();
                            display.textContent = 'NO NONSENSE';
                            shouldIClear = true;
                            operatorLast = true;
                        } else {
                            if (a == NaN || a == '') {
                                clearMe();
                                display.textContent = 'Bad Math'
                                shouldIClear = true;
                                operatorLast = true;
                            }
                            if (display.textContent.length > 11) {
                                clearMe();
                                display.textContent = 'Too Large';
                                shouldIClear = true;
                                operatorLast = true;
                            } else {
                                display.textContent = operate(currentOpp, a, b);
                                display2.textContent = a + currentOpp + b;
                                shouldIClear = true;
                                operatorAgain = false;
                            }
                        }

                    }

                }
            }
        });

        // This is the sqrt button declaration.

        sqrt.addEventListener('click', () => {
            if (display.textContent !== 'Too Large') {
                a = display.textContent;
                display2.textContent = 'sqrt(' + a + ')';
                display.textContent = sqrtFun(a);
                operatorLast = true;
                shouldIClear = true;
            }
        });

        // This is what happens when the negative button is hit.

        negative.addEventListener('click', () => {
            tempB = display.textContent.split('')
            if (tempB[0] != '-') {
                tempB.unshift('-');
                tempB = tempB.join('');
                display.textContent = tempB;
            } else {
                tempB.shift();
                tempB = tempB.join('');
                display.textContent = tempB;
            }
        });

        backspace.addEventListener('click', () => {
            if (shouldIClear == true) {
                clearMe();
            } else {
                display.textContent = display.textContent.slice(0, display.textContent.length - 1);
            }
        });

        //        case '%':
        //            return a * (b / 100);
        //            break;
        //
        //            percent.addEventListener('click', () => {
        //                a = display.textContent;
        //                display2.textContent = a + '%';
        //                display.textContent = '';
        //                currentOpp = '%';
        //            });
        //
        //        const percent = document.getElementById('percent');
        //
        //        const percentFun = function(a, b) {
        //            return a * (b / 100);
        //        }
    }

</script>
<style>

    button {
        border-radius: 15px;
    }

    .pageContainer {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 50px 1fr 1fr;
    }

    .container {
        display: grid;
        margin: 0 auto;
        grid-template-columns: repeat(5, 70px);
        grid-template-rows: 40px 100px 20px 70px 70px 70px 70px;
        grid-row-gap: 10px 10px 10px 10px 10px 10px 10px;
        background-color: #D6DBD2;
        width: auto;
        border: 10px solid #D6DBD2;
        border-radius: 10px;
    }

    .number {
        background-color: #F2F5EA;
    }



    #display,
    #display2 {
        text-align: right;
        color: #F2F5EA;
        padding-bottom: 20px;
    }

    #display {
        font-size: 30px;

    }

    #display2 {
        font-size: 15px;
    }

    #display2Div,
    #displayDiv {
        grid-column: 1/6;
        background-color: #2C363F;
        padding-bottom: 20px;
    }

    #CE {
        background-color: #F45B69;
    }

    .operator,
    #sqrt,
    #negative,
    #backspace {
        background-color: #437C90;
    }

    #equals {
        background-color: #F2F5EA
    }

    #A {
        grid-column-start: 1;
        grid-column-end: 6;
        margin-top: -75px;
    }

    #B {
        grid-column-start: 1;
        grid-column-end: 6;
    }

    #spacer {
        grid-column: 1/6
    }

</style>

<body>
    <div class='pageContainer'>

        <div id='A'>
        </div>
        <div>
        </div>
        <div class='container'>
            <div id='display2Div'>
                <p id='display2'></p>
            </div>
            <div id='displayDiv'>
                <p id='display'></p>
            </div>
            <div id='spacer'></div>
            <button class='number' id='seven'>7</button>
            <button class='number' id='eight'>8</button>
            <button class='number' id='nine'>9</button>
            <button id='CE'>CE</button>
            <button class='' id='backspace'>←</button>
            <button class='number' id='four'>4</button>
            <button class='number' id='five'>5</button>
            <button class='number' id='six'>6</button>
            <button class='operator ' id='multiply'>*</button>
            <button class='operator ' id='divide'>/</button>
            <button class='number' id='one'>1</button>
            <button class='number' id='two'>2</button>
            <button class='number' id='three'>3</button>
            <button class='operator ' id='plus'>+</button>
            <button class='operator ' id='subtract'>-</button>
            <button class='number' id='zero'>0</button>
            <button class='number ' id='decimal'>.</button>
            <button class='' id='equals'>=</button>
            <button class='' id='sqrt'>sqrt</button>
            <button class='' id='negative'>+/-</button>
        </div>
        <div>
            <p>&nbsp;</p>
        </div>
        <div id='B'>
            <p>&nbsp;</p>
        </div>
    </div>
</body>