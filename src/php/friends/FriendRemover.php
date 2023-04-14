<?php


class FriendRemover
{
    private $dbConnection;
    private $username;
    private $friendUsername;
    public function __construct()
    {
        require_once '../db/dbConnection.php';

        $this->dbConnection = new dbConnection();

        if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
        $this->username = $_SESSION["username"];
        $this->friendUsername = $_SESSION["friendUsername"];
    }

    public function removeFriend()
    {
        $removeFriendSQL = "DELETE FROM friend WHERE (username1 = '$this->username' OR username2 = '$this->username') AND (username1 = '$this->friendUsername' OR username2 = '$this->friendUsername')";
        mysqli_query($this->dbConnection->getConnection(), $removeFriendSQL);
    }

}