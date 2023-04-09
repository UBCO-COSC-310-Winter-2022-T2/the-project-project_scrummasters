<?php

session_start();
class NameChanger
{
    private $newFirstName;
    private $newLastName;
    private $username;

    private $dbConnection;


    public function __construct()
    {
        require_once('../db/dbConnection.php');


        $this->dbConnection = new dbConnection();
        $this->username = $_SESSION["username"];
        $this->newLastName = $_SESSION["newLastName"];
        $this->newFirstName = $_SESSION["newFirstName"];

    }


    public function changeName()
    {
        $sql = "SELECT username FROM discordUser WHERE username = '$this->username'";
        $result = mysqli_query($this->dbConnection->getConnection(), $sql);

        if ($row = $result->fetch_assoc()) {
            $changeName = "UPDATE discordUser SET firstName = '$this->newFirstName', lastName = '$this->newLastName' WHERE username = '$this->username'";
            mysqli_query($this->dbConnection->getConnection(), $changeName);
        }
    }



}

?>