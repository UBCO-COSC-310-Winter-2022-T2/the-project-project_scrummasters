<?php
if (session_status() != PHP_SESSION_ACTIVE) {session_start();}

if($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../../../html/badrequest.html");
    exit();
}
    require_once 'ServerMessageSender.php';
    require_once '../db/dbConnection.php';


$_SESSION["serverID"] = $_POST["serverID"];
$_SESSION["serverMessage"] = addslashes($_POST["serverMessage"]);

$serverMessageSender = new ServerMessageSender();
$serverMessageSender->sendMessage();

unset($_SESSION["serverID"]);

?>
