<?php
session_start();
if(!empty($_SESSION["username"])) {
    include("../includes/navigation.php");
    include("../includes/serverList.php");


}
else{ header("Location: ../../html/loginform.php");}

?>
<style>
    html, body{
        background-color: #23272a;
        color: #dddddd;
    }
</style>
