<?php


class DirectMessagesGetter
{
    private $dbConnection;
    private $friendUsername;
    private $username;
    public function __construct()
    {
        session_start();
        require_once '../db/dbConnection.php';
        $this->dbConnection = new dbConnection();
        $this->friendUsername = $_SESSION["friendUsername"];
        $this->username = $_SESSION["username"];

    }

    public function getDirectMessages()
    {
        $getDirectMessagesSQL = "SELECT * FROM directMessage WHERE (sourceUsername = '$this->username' OR destUsername = '$this->username') AND (sourceUsername = '$this->friendUsername' OR destUsername = '$this->friendUsername')";
        return mysqli_query($this->dbConnection->getConnection(), $getDirectMessagesSQL);
    }


}