<?php

if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
class ServerMessageSender
{
    private $serverMessage;
    private $senderUsername;
    private $serverID;
    private $dbConnection;

    public function __construct()
    {
        $this->serverID= $_SESSION["serverID"];
        $this->senderUsername=$_SESSION["username"];
        $this->serverMessage=$_SESSION["serverMessage"];
        require_once '../db/dbConnection.php';
        $this->dbConnection = new dbConnection();
    }

    public function sendMessage()
    {
        $sql = "INSERT INTO serverMessage(serverMessage, senderUsername, serverID) VALUES ('$this->serverMessage', '$this->senderUsername', '$this->serverID')";
        return  mysqli_query($this->dbConnection->getConnection(), $sql);
    }


}