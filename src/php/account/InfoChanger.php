<?php



if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



class InfoChanger
{
    private $param;
    private $value;
    private $username;
    private $hashedPassword;
    private $dbConnection;
    public function __construct()
    {
        require_once('../db/dbConnection.php');

        $this->dbConnection = new dbConnection();
        $this->username = $_SESSION["username"];
        $this->param = $_SESSION["param"];
        $this->value = $_SESSION["value"];
        $this->hashedPassword = $_SESSION["password"];
    }

    public function confirmPassword()
    {
        $confirmPassword = "SELECT password FROM discordUser WHERE username = '$this->username'";
        $result = mysqli_query($this->dbConnection->getConnection(), $confirmPassword);
        $row = $result->fetch_assoc();
        return $row["password"] == $this->hashedPassword;

    }

    public function changeInfo()
    {

        $changeUniqueInfo = "UPDATE discordUser SET `$this->param` = '$this->value' WHERE username ='$this->username'";
       return mysqli_query($this->dbConnection->getConnection(), $changeUniqueInfo);
    }
    public function isInfoUnique()
    {
        $checkIfInfoExists = "SELECT * FROM discordUser WHERE `$this->param` = '$this->value'";
        $result = mysqli_query($this->dbConnection->getConnection(), $checkIfInfoExists);

        if($row = $result->fetch_assoc())
        {
            return false;
        }

        return true;

    }

}

?>