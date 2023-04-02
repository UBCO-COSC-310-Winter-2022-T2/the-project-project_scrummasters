<?php
namespace Shaheershoaib\TheProjectProjectScrummasters\php\auth\signup;

class SignUpFormGetter
{

    private $username;
    private $password;
    private $email;
    private $phoneNumber;
    private $firstName;
    private $lastName;
    private $hashedPassword;


    public function __construct()
    {
        $this->username = $_POST["username"];
        $this->password = $_POST["password"];
        $this->email = $_POST["email"];
        $this->phoneNumber = $_POST["phoneNumber"];
        $this->firstName = $_POST["firstName"];
        $this->lastName = $_POST["lastName"];
        $this->hashedPassword = md5($this->password);

    }

    /**
     * @return mixed
     */
    public function getFirstName(): mixed
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName(): mixed
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail(): mixed
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getUsername(): mixed
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber(): mixed
    {
        return $this->phoneNumber;
    }


}


?>
