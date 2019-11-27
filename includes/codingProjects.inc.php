
<?php include("./includes/in_includes/cPHeader.inc.php"); ?>
<?php

$project = $_REQUEST['project'];
$project_type = $_REQUEST['project_type'];
$nextpage = './Projects/'.$project.'/index.php';
echo "<div class = 'project' id = '$project'>";
$replaced_str = preg_replace('(_)', ' ', $project);
echo '<h2>'.$replaced_str.'</h2>';

if ($project_type == 'embed'){
include($nextpage);
}
else if ($project_type == 'frame'){
    echo "<iframe class='frame' src='./Projects/" . $project . "/index.php'></iframe>";
}


echo "</div>";

?>