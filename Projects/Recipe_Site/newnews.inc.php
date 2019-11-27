

<form action="index.php" method="post">

<h2>Enter your news article</h2><br>

Date:<input type="date" size="40" name="date" value="<?php echo date("Y/m/d") ?>"><br>

Title:<input type="text" size="40" name="title"><br>

Article:<br>

<textarea rows="10" cols="50" name="article"></textarea><br>

<input type="submit" value="Submit">

<input type="hidden" name="content" value="addnews">

</form>

