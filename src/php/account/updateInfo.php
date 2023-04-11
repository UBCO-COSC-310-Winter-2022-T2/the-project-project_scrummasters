<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if($_SERVER["REQUEST_METHOD"] != "POST")
{
    header("Location: ../../html/badrequest.html");
    exit();
}

session_start();
require_once '../db/dbConnection.php';
$param =  $_POST["param"];
$username = $_SESSION["username"];
$dbConnection  = new dbConnection();
$connection= $dbConnection->getConnection();

$sql = "SELECT `$param` FROM discordUser WHERE username = '$username'";
$result = mysqli_query($connection, $sql);
$row = $result->fetch_assoc();
echo $row[$param];
?>