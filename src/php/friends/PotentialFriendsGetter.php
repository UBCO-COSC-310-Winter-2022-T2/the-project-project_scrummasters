<?php


class PotentialFriendsGetter
{
    private $dbConnection;
    private $username;

    public function __construct()
    {
        require_once '../../db/dbConnection.php';
        $this->dbConnection = new dbConnection();
        $this->username = $_SESSION["username"];
    }

    public function getPotentialFriends()
    {
        // A potential friend is anyone who the current user does not have a friend request from, or is not their friend
            // A friend request to the current user will be in the format (potentialFriend, currentUser)

        $getPotentialFriendsSQL = "SELECT username as potentialFriend FROM discordUser WHERE username != '$this->username' AND NOT EXISTS (SELECT username1 FROM friend WHERE (username1 = '$this->username' OR username2 = '$this->username') AND (username1 = username OR username2 = username) ) AND NOT EXISTS (SELECT username1 FROM friendRequest WHERE (username1 = username AND username2 = '$this->username'))";
        return mysqli_query($this->dbConnection->getConnection(), $getPotentialFriendsSQL);

    }
}