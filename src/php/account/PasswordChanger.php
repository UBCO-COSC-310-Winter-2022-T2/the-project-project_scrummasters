<?php


class PasswordChanger
{
    private $oldPassword;
    private $newPassword;
    private $username;
    private $dbConnection;

    public function __construct()
    {
        require_once '../db/dbConnection.php';
        $this->oldPassword = $_SESSION["oldPassword"];
        $this->newPassword = $_SESSION["newPassword"];
        $this->username = $_SESSION["username"];
        $this->dbConnection = new dbConnection();
    }

    public function confirmPassword()
    {
        $confirmPasswordSQL = "SELECT password FROM discordUser WHERE username = '$this->username'";
        $result = mysqli_query($this->dbConnection->getConnection(), $confirmPasswordSQL);
        $row = $result->fetch_assoc();
        if($row["password"] == $this->oldPassword)
            return 1;
        return 0;
    }

    public function changePassword()
    {
        $changePasswordSQL = "UPDATE discordUser SET password = '$this->newPassword' WHERE username = '$this->username'";
        return mysqli_query($this->dbConnection->getConnection(), $changePasswordSQL);
    }
}