<?php
namespace Shaheershoaib\TheProjectProjectScrummasters\php\auth\login;

class LoginFormGetter
{

    private $username;
    private $password;
    private $hashedPassword;


    public function __construct()
    {
        $this->username = $_POST["username"];
        $this->password = $_POST["password"];
        $this->hashedPassword = md5($this->password);

    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getHashedPassword()
    {
        return $this->hashedPassword;
    }

    public function getUsername()
    {
        return $this->username;
    }


}


?>
