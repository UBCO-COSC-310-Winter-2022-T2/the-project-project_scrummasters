<?php


class ServerMessagesGetter
{
    private $serverID;
    private $dbConnection;
    public function __construct()
    {
        $this->serverID = $_SESSION["serverID"];
        require_once '../db/dbConnection.php';
        $this->dbConnection = new dbConnection();
    }

    public function getServerMessages()
    {
        $getServerMessagesSQL = "SELECT * FROM serverMessage WHERE serverID = '$this->serverID'";
        return mysqli_query($this->dbConnection->getConnection(), $getServerMessagesSQL);
    }
}