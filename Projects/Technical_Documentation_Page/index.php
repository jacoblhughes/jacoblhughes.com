
<head>

    <!-- Technical_Documentation_Page -->

</head>

<body>
    <div class="container">
        <div id="navbar">
            <div id="nav-title">
                <h1>Create CSS Grid</h1>
            </div>
            <div class='nav-div'>
                <a class="nav-link" href="#Introduction">
                    Introduction
                </a>
            </div>
            <div class='nav-div'>
                <a class="nav-link" href="#Basic_Layout">
                    Basic Layout
                </a>
            </div>
            <div class='nav-div'>
                <a class="nav-link" href="#What_is_'fr'">
                    What is "fr"
                </a>
            </div>
            <div class='nav-div'>
                <a class="nav-link" href="#Add_Grid_Function">
                    Add Grid Function
                </a>
            </div>
            <div class='nav-div'>
                <a class="nav-link" href="#Defining_Columns">
                    Defining Columns
                </a>
            </div>
            <div class='nav-div'>
                <a class="nav-link" href="#Defining_Rows">
                    Defining Rows
                </a>
            </div>
            <div class='nav-div'>
                <a class="nav-link" href="#Summation">
                    Summation
                </a>
            </div>

        </div>
        <div id="main-doc">
            <section class="main-section" id="Introduction">
                <h1>Introduction</h1>
                <p>CSS Grid is a very handy and simple way to organize your website layout, allowing you more time to work on your bigger projects (headaches).</p>
                <p>In order to add CSS Grid to your website, simply follow my short tutorial!</p>
                <p>After this quick tutorial you will be able to:</p>
                <ul>
                    <li>Add CSS Grid to your website</li>
                    <li>Adjust your layout</li>
                    <li>Understand property settings</li>
                    <li>Set the quantity and dimensions of columns</li>
                    <li>Set the quantity and dimensions of rows</li>
                </ul>
                <p>And remember:</p>
                <code>Coding is fun!</code>
            </section>
            <div class="spacer"></div>
            <section class="main-section" id="Basic_Layout">
                <h1>Basic Layout</h1>
                <p>The basic layout of CSS Grid allows you to adjust the number of columns and rows you would like in a "grid".</p>
                <p>An example grid is shown below:</p>
                <div id="example-grid">
                    <div class='example-div'>1</div>
                    <div class='example-div'>2</div>
                    <div class='example-div'>3</div>
                    <div class='example-div'>4</div>
                    <div class='example-div'>5</div>
                    <div class='example-div'>6</div>
                    <div class='example-div'>7</div>
                    <div class='example-div'>8</div>
                    <div class='example-div'>9</div>
                </div>
            </section>
            <div class="spacer"></div>
            <section class="main-section" id="What_is_'fr'">
                <h1>What is 'fr'</h1>
                <p>'fr' is a unit of length corresponding to a
                    <strong>
                        <u>fr</u>
                    </strong>action of the remaining length.</p>
                <p>An example of using fr:</p>
                <code>width: 1fr;</code>
                <p>This would make the width of your element take up the whole of the remaining length, because you have divided it into 1 fraction!</p>
            </section>
            <div class="spacer"></div>
            <section class="main-section" id="Add_Grid_Function">
                <h1>Add Grid Function</h1>
                <p>Adding CSS Grid to your website is simple.</p>
                <p>Simply add this line to the container you would like to be a grid:</p>
                <code>display: grid;</code>
                <p>Or you can add:</p>
                <code>display: inline-grid;</code>
            </section>
            <div class="spacer"></div>
            <section class="main-section" id="Defining_Columns">
                <h1>Defining Columns</h1>
                <p>Columns can be any width you'd like!</p>
                <p>Using CSS Grid properties to define a container that is three even sections:</p>
                <code>grid-template-columns: repeat(3, 1fr);</code>
            </section>
            <div class="spacer"></div>
            <section class="main-section" id="Defining_Rows">
                <h1>Defining Rows</h1>
                <p>Rows can be any width you'd like!</p>
                <p>Using CSS Grid properties to define a container that is three even sections:</p>
                <code>grid-template-rows: repeat(3, 1fr);</code>
            </section>
            <div class="spacer"></div>
            <section class="main-section" id="Summation">
                <h1>Summation</h1>
                <p>Let's wrap it up, your container element would have:</p>
                <code>display: grid;</code>
                </br>
                <code>grid-template-columns: repeat(3, 1fr);</code>
                </br>
                <code>grid-template-rows: repeat(3, 1fr);</code>
                </br>
                <p>This will create a container with a 3x3 grid taking up 1/3 of the available width and height of the space!</p>
            </section>
            <div class="spacer"></div>
        </div>
    </div>
</body>
