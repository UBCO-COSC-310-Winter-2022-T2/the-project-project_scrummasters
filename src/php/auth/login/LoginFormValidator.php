<?php



require_once('../../db/dbConnection.php');

class LoginFormValidator
{

    private $loginFormGetter;

    public function __construct($loginFormGetter)
    {
        $this->loginFormGetter = $loginFormGetter;
    }

    public function isValid()
    {

        $dbConnection = new dbConnection();


        $username = $this->loginFormGetter->getUsername();
        $hashedPassword = $this->loginFormGetter->getHashedPassword();

        $sql = "SELECT username, password FROM discordUser WHERE username = '$username'";
        $result = mysqli_query($dbConnection->getConnection(), $sql);

        if ($row = mysqli_fetch_assoc($result))
            if ($row['password'] == $hashedPassword)
                return true;
        return false;
    }

}