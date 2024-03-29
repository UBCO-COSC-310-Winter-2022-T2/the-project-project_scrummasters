<?php



class FriendRequestCanceller
{

    private $username;
    private $potentialFriendUsername;
    private $dbConnection;

    public function __construct()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
        $this->username = $_SESSION["username"];
        $this->potentialFriendUsername = $_SESSION["potentialFriendUsername"];

        require_once '../db/dbConnection.php';
        $this->dbConnection = new dbConnection();

    }

    public function cancelFriendRequest()
    {
        $sendFriendRequestSQL = "DELETE FROM friendRequest WHERE username1 = '$this->username' AND username2 = '$this->potentialFriendUsername'";
        return mysqli_query($this->dbConnection->getConnection(), $sendFriendRequestSQL);
    }

}