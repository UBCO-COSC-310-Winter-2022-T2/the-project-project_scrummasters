<?php
if (session_status() != PHP_SESSION_ACTIVE) {session_start();}


if($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../../../html/badrequest.html");
    exit();
}
require_once 'DirectMessageSender.php';


$_SESSION["friendUsername"] = $_POST["friendUsername"];
$_SESSION["directMessage"] = addslashes($_POST["directMessage"]);

echo $_SESSION["friendUsername"];

$directMessageSender= new DirectMessageSender();
$directMessageSender->sendMessage();

unset($_SESSION["friendUsername"]);
unset($_SESSION["directMessage"]);

?>
