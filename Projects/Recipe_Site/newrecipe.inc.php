
<?php

if (!isset($_SESSION['valid_recipe_user']))

{

    echo "<h2>Sorry, you do not have permission to post recipes</h2><br>\n";

    echo "<a href=\"index.php?content=login\">Please login to post recipes</a><br>\n";

    echo "<a href=\"index.php\">Go back to Home</a>\n";

} else

{

    $userid = $_SESSION['valid_recipe_user'];

    echo "<form action='index.php' method='post'>";

    echo "<h2>Enter your new recipe</h2><br>";
    
    echo "Title:<input type='text' size='40' name='title'><br>";
    
    echo "Poster:<input type='text' size='40' name='poster'><br>";
    
    echo "Short Description:<br>";
    
    echo "<textarea rows='5' cols='50' name='shortdesc'></textarea><br>";
    
    echo "<h3>Ingredients (one item per line)</h3>";
    
    echo "<textarea rows='10' cols='50' name='ingredients'></textarea><br>";
    
    echo "<h3>Directions</h3>";
    
    echo "<textarea rows='10' cols='50' name='directions'></textarea><br>";
    
    echo "<input type='submit' value='Submit'>";

    echo "<input type='hidden' name='poster' value='$userid'><br>\n";
    
    echo "<input type='hidden' name='content' value='addrecipe'>";
    
    echo "</form>";

}

?>
