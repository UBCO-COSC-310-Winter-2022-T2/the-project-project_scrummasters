<?php


if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
if(empty($_SESSION["username"])) {
    header("Location: ../loginform.php");
    exit();
}

require_once 'FriendRequestCanceller.php';

$_SESSION["potentialFriendUsername"] = $_POST["potentialFriendUsername"];
$friendRequestCanceller = new FriendRequestCanceller();
$friendRequestCanceller->cancelFriendRequest();
unset($_SESSION["potentialFriendUsername"]);

?>