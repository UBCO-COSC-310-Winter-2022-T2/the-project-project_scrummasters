<?php

if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
class DirectMessageSender
{
    private $directMessage;
    private $senderUsername;
    private $friendUsername;
    private $dbConnection;

    public function __construct()
    {
        $this->friendUsername=$_SESSION["friendUsername"];
        $this->senderUsername=$_SESSION["username"];
        $this->directMessage=$_SESSION["directMessage"];
        require_once '../db/dbConnection.php';
        $this->dbConnection = new dbConnection();
    }

    public function sendMessage()
    {
        $sql = "INSERT INTO directMessage(message, sourceUsername, destUsername) VALUES ('$this->directMessage', '$this->senderUsername', '$this->friendUsername')";
        return mysqli_query($this->dbConnection->getConnection(), $sql);
    }


}