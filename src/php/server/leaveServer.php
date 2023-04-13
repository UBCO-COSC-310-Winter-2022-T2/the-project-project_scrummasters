<?php
session_start();
if (empty($_SESSION["username"]) || !isset($_GET['serverID'])) {
    header("Location: ../views/loginform.php");
    exit();
}
require_once '../db/dbConnection.php';
$dbConnection = new dbConnection();
$serverID = $_GET['serverID'];
$username = $_SESSION['username'];

$sql = "DELETE FROM userinserver WHERE username =\"$username\" AND serverID = $serverID";
$result = mysqli_query($dbConnection->getConnection(), $sql);
header("Location: ../views/home.php");