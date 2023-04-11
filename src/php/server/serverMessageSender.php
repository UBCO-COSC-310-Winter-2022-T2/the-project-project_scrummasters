<?php

session_start();
class serverMessageSender
{
    private $serverMessage;
    private $senderUsername;
    private $serverID;

    public function __construct($serverID)
    {
        $this->serverID=$serverID;
        $this->senderUsername=$_SESSION["username"];
        $this->serverMessage=$_POST["message"];
    }

    /**
     * @return mixed
     */
    public function getServerMessage(): mixed
    {
        return $this->serverMessage;
    }

    /**
     * @return mixed
     */
    public function getSenderUsername(): mixed
    {
        return $this->senderUsername;
    }

    /**
     * @return mixed
     */
    public function getServerID()
    {
        return $this->serverID;
    }



}