<?php



if($_POST['test'] == 'testing'){
    require_once('../db/dbConnection.php');
    require_once('SignUpFormValidator.php');
}
else{
    require_once('SignUpFormValidator.php');
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


        $signUpFormValidator = new SignUpFormValidator($email, $username, $phoneNumber);
        if(!$signUpFormValidator->isValid()) {

                header("Location: ../../views/signupform.php");


            exit();
        }

        $sql = "INSERT INTO discordUser(firstName, lastName, email, phoneNumber, username, password) VALUES('$firstName', '$lastName','$email','$phoneNumber','$username','$hashedPassword')";
        $result = mysqli_query($this->dbConnection->getConnection(), $sql);

    }







}