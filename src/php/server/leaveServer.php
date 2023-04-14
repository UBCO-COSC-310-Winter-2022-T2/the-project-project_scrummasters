<?php
if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
if ($_SERVER["REQUEST_METHOD"]!="POST") {
    header("Location: ../../html/badrequest.html");
    exit();
}
require_once '../db/dbConnection.php';
require_once 'ServerLeaver.php';

$_SESSION["serverID"] = $_POST['serverID'];

$serverLeaver = new ServerLeaver();
$serverLeaver->leaveServer();
unset($_SESSION["serverID"]);

header("Location: ../views/home.php");