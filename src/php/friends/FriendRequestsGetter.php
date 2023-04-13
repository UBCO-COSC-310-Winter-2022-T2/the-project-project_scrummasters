<?php


class FriendRequestsGetter
{
    private $username;
    private $dbConnection;

    public function __construct()
    {
        session_start();
        require_once '../../db/dbConnection.php';
        $this->dbConnection = new dbConnection();
        $this->username = $_SESSION["username"];
    }

    public function getFriendRequests()
    {
        $getFriendsSQL = "SELECT username1 as friendRequest FROM friendRequest WHERE username2 = '$this->username'";
        return mysqli_query($this->dbConnection->getConnection(), $getFriendsSQL);

    }
}