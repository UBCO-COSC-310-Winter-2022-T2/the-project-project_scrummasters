<?php


class FriendsListGetter
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

    public function getFriends()
    {
        $getFriendsSQL = "(SELECT username1 as friend FROM friend WHERE username2 = '$this->username') UNION (SELECT username2 as friend FROM friend WHERE username1 = '$this->username')";
        return mysqli_query($this->dbConnection->getConnection(), $getFriendsSQL);

    }
}