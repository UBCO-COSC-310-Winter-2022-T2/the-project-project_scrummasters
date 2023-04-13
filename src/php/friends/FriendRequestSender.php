<?php



class FriendRequestSender
{

    private $username;
    private $potentialFriendUsername;
    private $dbConnection;

    public function __construct()
    {
        session_start();
        $this->username = $_SESSION["username"];
        $this->potentialFriendUsername = $_SESSION["potentialFriendUsername"];

        require_once '../db/dbConnection.php';
        $this->dbConnection = new dbConnection();

    }

    public function sendFriendRequest()
    {
        $sendFriendRequestSQL = "INSERT INTO friendRequest VALUES('$this->username', '$this->potentialFriendUsername')";
        mysqli_query($this->dbConnection->getConnection(), $sendFriendRequestSQL);
    }

}