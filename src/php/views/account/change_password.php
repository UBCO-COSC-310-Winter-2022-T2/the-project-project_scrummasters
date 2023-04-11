<?php

if(empty($_SESSION["username"]))
{
    header("Location: ../loginform.php");
    exit();
}


?>
