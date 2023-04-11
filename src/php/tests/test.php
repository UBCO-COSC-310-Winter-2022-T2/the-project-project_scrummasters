<?php
use PHPUnit\Framework\TestCase;
require_once('../db/dbConnection.php');



class phpUnitTest extends TestCase
{
    private $dbConnection;

    //setup create
    protected function setUp(): void
    {
        //add test user to the discordUser table
        $_POST['test']='testing';
        $this->dbConnection = new dbConnection();
        $sql = "INSERT INTO discordUser(firstName, lastName, email, phoneNumber, username, password) VALUES('test', 'test','test@gmail.com','0123456789','testing','test')";
        $result = mysqli_query($this->dbConnection->getConnection(), $sql);
    }

    protected function tearDown(): void
    {
        //deleting test user from table discordUser
        $sqldown = "DELETE FROM discordUser WHERE username='testing'";
        $result = mysqli_query($this->dbConnection->getConnection(), $sqldown);
        unset($_POST['username']);
        unset($_POST['password']);
        unset($_POST['email']);
        unset($_POST['phoneNumber']);
        unset($_POST['firstName']);
        unset($_POST['lastName']);
        $_POST['test'] = null;

        //deleteUserFromDatabase

    }

    //tearDown delete


    public function testRegistrationNew(){
        $bool = false;
        $_POST['username'] = 'testRegistration';
        $_POST['password'] = 'testRegistration';
        $_POST['email'] = 'testRegistration@gmail.com';
        $_POST['phoneNumber'] = '246813579';
        $_POST['firstName'] = 'testRegistration';
        $_POST['lastName'] = 'testRegistration';

        require_once('../auth/signup/SignUpFormGetter.php');
        require_once('../auth/signup/SignUpFormInserter.php');

        $signUpFormGetter = new SignUpFormGetter();
        $signUpFormInserter = new SignUpFormInserter($signUpFormGetter);
        $signUpFormInserter->insert();



        $sql = "SELECT username FROM discordUser WHERE username = 'testRegistration'";
        $result = mysqli_query($this->dbConnection->getConnection(), $sql);

        $sql2 = "DELETE FROM discordUser WHERE username = 'testRegistration'";
        $result2 = mysqli_query($this->dbConnection->getConnection(), $sql2);

        if($row = mysqli_fetch_assoc($result))
        {
            $bool = true;
        }
        self::assertTrue($bool);
    }


    public function testSimpleTrue()
    {
        $this->assertTrue(true);
    }

}

?>