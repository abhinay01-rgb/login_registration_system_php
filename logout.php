<?php




//start the session and get data
session_start(); 
session_unset();  //unset all the user detail
session_destroy(); //destroy the session

header("location:login.php");

exit;




?>