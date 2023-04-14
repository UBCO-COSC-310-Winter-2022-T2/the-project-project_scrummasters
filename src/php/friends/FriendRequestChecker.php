<?php


class FriendRequestChecker
{
    private $username;
    private $dbConnection;

    public function __construct()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
        $this->username = $_SESSION["username"];

        require_once '../../db/dbConnection.php';
        $this->dbConnection = new dbConnection();

    }

    public function friendRequestExists($potentialFriendUsername)
    {
        $doesFriendRequestAlreadyExistSQL= "SELECT * FROM friendRequest WHERE username1 = '$this->username' AND username2 = '$potentialFriendUsername'";
        $result = mysqli_query($this->dbConnection->getConnection(), $doesFriendRequestAlreadyExistSQL);

        return $result->num_rows > 0; // If a friend request exists, then there will be 1 row, hence true will be returned.
    }
}