<?php
$hostname = "localhost";
$username = "root";
$password = "T305!r4ul3232";
$db = "casapescarului";

$connection = mysqli_connect($hostname,$username,$password)
or die ("Error!The required function has an error, it is possible that the 3 parameters to be completed wrong!");

$database = mysqli_select_db($connection,$db)
or die ("Error!The name of the database does not exist!");
?>