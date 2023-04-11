<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'serverMessageSender.php';
    require_once '../db/dbConnection.php';
    //connect to db
    $dbConnection = new dbConnection();
    //get information on the message being recieved
    $serverMessageSender = new serverMessageSender($_GET["serverID"]);

    $message = $serverMessageSender->getServerMessage();
    $senderUsername = $serverMessageSender->getSenderUsername();
    $serverID = $serverMessageSender->getServerID();

    //insert message into database
    $sql = "INSERT INTO servermessage(serverMessage, senderUsername, serverID) VALUES (\"$message\", \"$senderUsername\", $serverID)";
    $result = mysqli_query($dbConnection->getConnection(), $sql);

    //go back to serverPage
    header("Location: ../views/serverPage.php?serverID=$serverID");


}

else {

    header("Location: ../../../html/badrequest.html");
    exit();

}

?>
