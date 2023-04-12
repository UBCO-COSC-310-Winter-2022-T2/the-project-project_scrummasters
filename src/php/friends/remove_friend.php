<?php
session_start();
if(empty($_SESSION["username"])) {
    header("Location: ../loginform.php");
    exit();
}


// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Your PHP code here


require_once 'FriendRemover.php';

$_SESSION["friendUsername"] = $_POST["friendUsername"];
$friendRemover = new FriendRemover();
$friendRemover->removeFriend();


?>