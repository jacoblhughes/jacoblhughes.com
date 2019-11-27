<?php

function login()
{
   $con = mysqli_connect("server237.web-hosting.com", "evidetqy", "Fitness#94", "evidetqy_store") or die('Sorry, could not connect to the database or server');
   return $con;
}
?>