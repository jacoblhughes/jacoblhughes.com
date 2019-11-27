<?php

$date = $_POST['date'];
$title = $_POST['title'];
$article = $_POST['article'];

if (trim($title) == "" OR trim($article) == "")

{

    echo "<h2>Sorry, each recipe must have a title and article link</h2>\n";

}else

{

    $con = mysqli_connect("localhost", "test", "test", "recipe") or die('Sorry, could not connect to the database or server');

    $query = "INSERT INTO `news` (`date`, `title`, `article`) VALUES ('$date','$title','$article')";

    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    if ($result)

       echo "<h2>News posted</h2>\n";

    else

       echo "<h2>Sorry, there was a problem posting your news link</h2>\n";

}

?>