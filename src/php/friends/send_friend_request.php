<?php


if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
if(empty($_SESSION["username"])) {
    header("Location: ../loginform.php");
    exit();
}

require_once 'FriendRequestSender.php';

$_SESSION["potentialFriendUsername"] = $_POST["potentialFriendUsername"];
$friendRequestSender = new FriendRequestSender();
$friendRequestSender->sendFriendRequest();
unset($_SESSION["potentialFriendUsername"]);

?>