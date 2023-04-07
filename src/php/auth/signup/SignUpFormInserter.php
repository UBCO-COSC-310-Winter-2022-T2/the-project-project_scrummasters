<?php


if($_POST['test'] = 'testing'){
    require_once('../db/dbConnection.php');
}
else{
    require_once('../../db/dbConnection.php');
}


class SignUpFormInserter
{
    private $signUpFormGetter;
    private $dbConnection;

    public function __construct($signUpFormGetter)
    {
        $this->signUpFormGetter= $signUpFormGetter;
        $this->dbConnection =  new dbConnection();
    }

    public function insert()
    {



        $firstName = $this->signUpFormGetter->getFirstName();
        $lastName = $this->signUpFormGetter->getLastName();
        $email= $this->signUpFormGetter->getEmail();
        $phoneNumber = $this->signUpFormGetter->getPhoneNumber();
        $username = $this->signUpFormGetter->getUsername();
        $hashedPassword = $this->signUpFormGetter->getHashedPassword();

        $this->checkIfEmailExists($email);
        $this->checkIfPhoneNumberExists($phoneNumber);
        $this->checkIfUsernameExists($username);


        $sql = "INSERT INTO discordUser(firstName, lastName, email, phoneNumber, username, password) VALUES('$firstName', '$lastName','$email','$phoneNumber','$username','$hashedPassword')";
        $result = mysqli_query($this->dbConnection->getConnection(), $sql);

    }

    private function checkIfEmailExists($email)
    {
        $sql = "SELECT email FROM discordUser WHERE email = '$email'";
        $result = mysqli_query($this->dbConnection->getConnection(), $sql);

        if($row = mysqli_fetch_assoc($result))
        {
            echo "This email already exists.";
            exit();
        }
    }

    private function checkIfPhoneNumberExists($phoneNumber)
    {
        $sql = "SELECT phoneNumber FROM discordUser WHERE phoneNumber = '$phoneNumber'";
        $result = mysqli_query($this->dbConnection->getConnection(), $sql);

        if($row = mysqli_fetch_assoc($result))
        {
            echo "This phone number already exists.";
            exit();
        }
    }



    private function checkIfUsernameExists($username)
    {
        $sql = "SELECT username FROM discordUser WHERE username = '$username'";
        $result = mysqli_query($this->dbConnection->getConnection(), $sql);

        if($row = mysqli_fetch_assoc($result))
        {
            echo "This username already exists.";
            exit();
        }
    }






}