<head>
    <meta charset="utf-8">


    <script>
        var numberOfFaces = 5;

        function generateFaces() {



            var theLeftSide = document.getElementById("leftSide");
            var theRightSide = document.getElementById("rightSide");

            while (theLeftSide.firstChild)
                theLeftSide.removeChild(theLeftSide.firstChild);
            while (theRightSide.firstChild)
                theRightSide.removeChild(theRightSide.firstChild);

            var theImg = document.createElement("img");
            theImg.className = "smile"
            theImg.src = "./images/smile.jpg";
            for (i = 0; i < numberOfFaces; i++) {
                var leftPosition = Math.floor(Math.random() * 300);

                var topPosition = Math.floor(Math.random() * 300);

                theImg.style.left = leftPosition + "px";
                theImg.style.top = topPosition + "px";
                theLeftSide.appendChild(theImg.cloneNode());

                };

            var leftSideImages = theLeftSide.cloneNode(true);
            leftSideImages.removeChild(leftSideImages.lastChild);
            theRightSide.appendChild(leftSideImages.cloneNode(true));


            theLeftSide.lastChild.onclick = function nextLevel(event) {
                event.stopPropagation();
                numberOfFaces += 5;
                generateFaces();
            }

            var theBody = document.getElementById("container");

            theBody.onclick = function gameOver() {
                alert("Game Over!");
                theBody.onclick = null;
                theLeftSide.lastChild.onclick = null;


            }

        };

        window.onload = generateFaces;
    </script>


</head>

<body>
    <div id="container">
        <div id="instruction"><h3>Click on the extra smiling face on the left!</h3></div>
        <div id="leftSide"></div>
        <div id="rightSide"></div>
    </div>
</body>