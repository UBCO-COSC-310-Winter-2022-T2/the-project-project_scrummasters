<?php

if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
class ServerLeaver
{
    private $dbConnection;
    private $serverID;
    private $username;
    public function __construct()
    {
        require_once '../db/dbConnection.php';
        $this->dbConnection = new dbConnection();
        $this->serverID = $_SESSION["serverID"];
        $this->username = $_SESSION["username"];

    }

    public function leaveServer()
    {
        $leaveFromServerSQL = "DELETE FROM userInServer WHERE username = '$this->username' AND serverID = '$this->serverID'";
        mysqli_query($this->dbConnection->getConnection(), $leaveFromServerSQL);
    }
}