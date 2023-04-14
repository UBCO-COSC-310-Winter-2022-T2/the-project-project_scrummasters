<?php
require_once '../db/dbConnection.php';
$dbConnection = new dbConnection();
$connection = $dbConnection->getConnection();
if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
if(!empty($_SESSION['username'])){
    $currentUsername = $_SESSION['username'];
    $sql = "Delete from discordUser where username = '$currentUsername'";
    $result = mysqli_query($dbConnection->getConnection(), $sql);
    session_destroy();
}
else{
    header("Location: ../..html/loginform.html");
}
?>