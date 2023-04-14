<?php



class FriendRequestHandler
{

    private $username;
    private $friendUsername;
    private $dbConnection;

    public function __construct()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {session_start();}
        $this->username = $_SESSION["username"];
        $this->friendUsername = $_SESSION["friendRequestUsername"];

        require_once '../db/dbConnection.php';
        $this->dbConnection = new dbConnection();
    }


    public function declineFriendRequest()
    {
        $deleteFriendRequestSQL = "DELETE FROM friendRequest WHERE username1 = '$this->friendUsername' AND username2 = '$this->username'";
        mysqli_query($this->dbConnection->getConnection(), $deleteFriendRequestSQL);
    }
    public function acceptFriendRequest()
    {
        $this->declineFriendRequest(); // Must delete the friend request first before adding as friend
        $addFriendSQL = "INSERT INTO friend VALUES ('$this->username', '$this->friendUsername')";
        mysqli_query($this->dbConnection->getConnection(),$addFriendSQL);
        //Delete the friend request first

    }

}