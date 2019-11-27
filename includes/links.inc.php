<div id='links_div'>
    <div id = 'links_links'>
    <?php
    $main_divs = array(
        array('home', 'index.php?content=main', 'Home'),
        array('fitness', 'index.php?content=fitness', 'Evident Fitness'),
        array('notary', 'index.php?content=notary', 'On That Notary'),
        array('coding', 'index.php?content=codingProjects&project=Project_Front_Page&project_type=embed', 'Coding Projects'),
        array('prof_qual', 'index.php?content=credentials', 'Street Cred'),
        array('resume', 'index.php?content=resume', 'Professional Resume'),
        array('coding', 'https://github.com/jacoblhughes/', 'Github (external)'),
        array('linkedin', 'https://www.linkedin.com/in/jacoblhughes/', 'LinkedIn (external)')

    );
    
    foreach ($main_divs as $main_divs) {
        echo "<div class = 'link' id = '$main_divs[0]'><a href = '$main_divs[1]'>$main_divs[2]</a></div>";
    };

    ?>

    </div>
    <div id = "blank_div">
    &nbsp;
    </div>
</div>