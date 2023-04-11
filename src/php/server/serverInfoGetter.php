<?php
session_start();
class serverInfoGetter
{
    private $serverID;
    private $serverName;
    private $inviteLink;
    private $adminUsername;
    private $dbConnection;
    public $connection;

    public function __construct($serverID)
    {
        require_once('../db/dbConnection.php');

        $this->dbConnection = new dbConnection();
        $this->connection = $this->dbConnection->getConnection();
        $this->serverID = $serverID;

        $sql = "SELECT * FROM discordServer WHERE serverID = '$this->serverID'";
        $result = mysqli_query($this->connection, $sql);


        if ($row = $result->fetch_assoc()) {
            $this->inviteLink = $row["inviteLink"];
            $this->adminUsername = $row["adminUsername"];
            $this->serverName = $row["serverName"];
        }


    }

    /**
     * @return mixed
     */
    public function getServerID()
    {
        return $this->serverID;
    }

    /**
     * @return mixed
     */
    public function getInviteLink(): mixed
    {
        return $this->inviteLink;
    }

    /**
     * @return mixed
     */
    public function getAdminID(): mixed
    {
        return $this->adminID;
    }
}