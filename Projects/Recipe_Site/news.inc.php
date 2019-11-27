<h3>What's Cookin'</h3>

<br>The latest cooking news<br>

<?php

$con = mysqli_connect("server237.web-hosting.com", "evidetqy", "Fitness#94", "evidetqy_recipe") or die('Sorry, could not connect to the database or server');

$query = "SELECT title, date, article FROM news ORDER BY DATE DESC limit 0,2";

$result = mysqli_query($con, $query) or die('Sorry, could not get news articles');

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))

{

    $date = $row['date'];

    $title = $row['title'];

    $article = $row['article'];

    echo "<br>$date - <b>$title</b><br>$article<br><br>";

}

?>