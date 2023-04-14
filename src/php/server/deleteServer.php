<?php
if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
require_once '../db/dbConnection.php';
$dbConnection = new dbConnection();
$connection = $dbConnection->getConnection();
$isAdmin = false;
if(isset($_POST['deleteServerID'])) {
    $serverID = $_POST['deleteServerID'];
}
else{header("Location: ../views/home.php");}
$username = $_SESSION['username'];
$sql1 = "SELECT * FROM discordServer WHERE serverID = $serverID";

$result1 = mysqli_query($connection, $sql1);
$row = $result1->fetch_assoc();
if($row['adminUsername'] == $username){
    $sql2 = "DELETE FROM discordServer WHERE serverID=$serverID";
    $result2 = mysqli_query($connection, $sql2);
    header("Location: ../views/home.php");
}
else{
    header("Location: ../views/home.php");
}





