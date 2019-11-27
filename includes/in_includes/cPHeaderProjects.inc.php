<!--
array('./Projects/D3_Heat_Map/index.html', 'D3 Heat Map'),
array('./Projects/D3_Scatter_Plot/index.html', 'D3 Scatter Plot'),
array('./Projects/D3_Bar_Chart/index.html', 'D3 Bar Chart')
-->
<?php
    $projects = array(
        // array('index.php?content=codingProjects&project=D3_Treemap&project_type=frame', 'D3 Treemap'),
        // array('index.php?content=codingProjects&project=D3_Choropleth&project_type=frame', 'D3 Choropleth'),
        array('index.php?content=codingProjects&project=D3_Heat_Map&project_type=frame', 'D3 Heat Map'),
        array('index.php?content=codingProjects&project=D3_Scatter_Plot&project_type=frame', 'D3 Scatter Plot'),
        array('index.php?content=codingProjects&project=D3_Bar_Chart&project_type=frame', 'D3 Bar Chart'),
        array('index.php?content=codingProjects&project=Recipe_Site&project_type=frame', 'Recipe Site'),
        array('index.php?content=codingProjects&project=Online_Store&project_type=frame', 'Online Store'),
        array('index.php?content=codingProjects&project=Drum_Machine&project_type=embed', 'Drum Machine'),
        array('index.php?content=codingProjects&project=Markdown_Preview&project_type=embed', 'Markdown Previewer'),
        array('index.php?content=codingProjects&project=Technical_Documentation_Page&project_type=embed', 'Technical Documentation Page'),
        array('index.php?content=codingProjects&project=Landing_Page&project_type=embed', 'Landing Page'),
        array('index.php?content=codingProjects&project=Survey_Form&project_type=embed', 'Survey Form'),
        array('index.php?content=codingProjects&project=Tic_Tac_Toe_Game&project_type=embed', 'Tic-Tac-Toe Game'),
        array('index.php?content=codingProjects&project=Simon_Says_Game&project_type=embed', 'Simon Says'),
        array('index.php?content=codingProjects&project=Pomodoro_Timer&project_type=embed', 'Pomodoro Timer'),
        array('index.php?content=codingProjects&project=Calculator&project_type=embed', 'Calculator'),
        array('index.php?content=codingProjects&project=Etch_A_Sketch&project_type=embed', 'Etch A Sketch'),
        array('index.php?content=codingProjects&project=Twitch_JSON_API&project_type=embed', 'Twitch JSON API'),
        array('index.php?content=codingProjects&project=Wikipedia_Viewer&project_type=embed', 'Wikipedia Viewer'),
        array('index.php?content=codingProjects&project=Local_Weather&project_type=embed', 'Local Weather'),
        array('index.php?content=codingProjects&project=Random_Quote_Machine&project_type=embed', 'Random Quote Machine'),
        array('index.php?content=codingProjects&project=Guess_The_Color&project_type=embed', 'Guess the Color'),
        array('index.php?content=codingProjects&project=Guess_The_Difference&project_type=embed', 'Guess the Difference'),
        array('index.php?content=codingProjects&project=Tribute_Page&project_type=embed', 'Tribute Page')

    );
    foreach ($projects as $projects) {
        echo "<a class = 'dropdown-item' href = '$projects[0]'>$projects[1]</a>";
    };

    ?>