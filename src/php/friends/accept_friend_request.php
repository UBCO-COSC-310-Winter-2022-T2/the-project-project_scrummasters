<?php

if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
if(empty($_SESSION["username"])) {
    header("Location: ../loginform.php");
    exit();
}


require_once 'FriendRequestHandler.php';
$_SESSION["friendRequestUsername"] = $_POST["friendRequestUsername"];

$friendRequestHandler = new FriendRequestHandler();
$friendRequestHandler->acceptFriendRequest();

unset($_SESSION["friendRequestUsername"]);

?>