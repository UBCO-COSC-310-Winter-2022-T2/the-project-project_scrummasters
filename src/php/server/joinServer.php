<?php
if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
if (empty($_SESSION["username"]) || !isset($_GET['serverID'])) {
    header("Location: ../views/loginform.php");
    exit();
}
require_once '../db/dbConnection.php';
$dbConnection = new dbConnection();
$serverID = $_GET['serverID'];
$username = $_SESSION['username'];
//check if user is already in server
$sql1 = "SELECT * FROM userinserver WHERE username=\"$username\" AND serverID=$serverID";
$result1 = mysqli_query($dbConnection->getConnection(), $sql1);
if($result1->num_rows>0){
    header("Location: ../views/serverPage.php?serverID=$serverID");
}

//insert the user into the server
$sql = "INSERT INTO userinserver(username, serverID) VALUES (\"$username\", $serverID)";
$result = mysqli_query($dbConnection->getConnection(), $sql);
header("Location: ../views/home.php");
?>