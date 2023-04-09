<?php



class SignUpFormValidator
{

    private $username;
    private $email;
    private $phoneNumber;
    private $dbConnection;
    public function __construct($email, $username, $phoneNumber)
    {
        $this->email = $email;
        $this->username = $username;
        $this->phoneNumber = $phoneNumber;
        $this->dbConnection = new dbConnection();


    }

    public function isValid()
    {
        if(!$this->emailExists() & !$this->phoneNumberExists() & !$this->usernameExists())
            return true;
        else return false;
    }

    private function emailExists()
    {
        $sql = "SELECT email FROM discordUser WHERE email = '$this->email'";
        $result = mysqli_query($this->dbConnection->getConnection(), $sql);

        if($row = mysqli_fetch_assoc($result))
        {
            session_start();
            $_SESSION["email_err"] = $this->email;
            return true;
        }
        return false;
    }

    private function phoneNumberExists()
    {
        $sql = "SELECT phoneNumber FROM discordUser WHERE phoneNumber = '$this->phoneNumber'";
        $result = mysqli_query($this->dbConnection->getConnection(), $sql);

        if($row = mysqli_fetch_assoc($result))
        {
            session_start();
            $_SESSION["phone_err"] = $this->phoneNumber;
            return true;
        }
        return false;
    }



    private function usernameExists()
    {
        $sql = "SELECT username FROM discordUser WHERE username = '$this->username'";
        $result = mysqli_query($this->dbConnection->getConnection(), $sql);

        if($row = mysqli_fetch_assoc($result))
        {
            session_start();
            $_SESSION["user_err"] = $this->username;
            return true;
        }
        return false;
    }

}