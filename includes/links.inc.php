<div id='links_div'>
    <div id = 'links_links'>
    <?php
    $main_divs = array(
        array('home', 'index.php?content=main', 'Home','HTML/CSS/PHP'),
        array('resume', 'index.php?content=resume', 'Resume',''),
        array('linkedin', 'https://www.linkedin.com/in/jacoblhughes/', 'LinkedIn (external)',''),
        array('fitness', 'https://www.evidentfitness.com', 'Evident Fitness (external)','Python(Django)/Javascript'),
        array('coding', 'index.php?content=codingProjects&project=Project_Front_Page&project_type=embed', 'Sample of older web projects','HTML/CSS/PHP/Java/Javascript/SQL'),
        array('prof_qual', 'index.php?content=credentials', 'Certifications',''),
        array('coding', 'https://github.com/jacoblhughes/', 'Github (external)',''),
        array('notary', 'index.php?content=notary', 'Notary Services','California Notary'),

    );
    
    foreach ($main_divs as $key=>$main_divs) {

        echo "<div class = 'link_big' id = '$main_divs[0]'><a href = '$main_divs[1]'>$main_divs[2]</a></div>";
        
        echo "<div class = 'link_sub' id = '$main_divs[0]_sub'>$main_divs[3]</div>";

    };

    ?>

    </div>
    <div id = "blank_div">
    <!-- &nbsp; -->
    </div>
</div>