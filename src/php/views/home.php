<?php
session_start();
if(!empty($_SESSION["username"]))
include("../includes/navigation.php");

else{ header("Location: ../../html/loginform.php");}

?>