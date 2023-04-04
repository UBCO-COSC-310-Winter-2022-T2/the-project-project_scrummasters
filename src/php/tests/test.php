<?php
use PHPUnit\Framework\TestCase;
class phpUnitTest extends TestCase
{
    //setup create
    protected function setUp(): void
    {

    }

    protected function tearDown(): void
    {
        unset($_POST['username']);
        unset($_POST['password']);
        unset($_POST['email']);
        unset($_POST['phoneNumber']);
        unset($_POST['firstName']);
        unset($_POST['lastName']);

        //deleteUserFromDatabase

    }

    //tearDown delete


    public function testRegistrationNew(){
        $_POST['username'] = 'gerry';
        $_POST['password'] = 'gerry';
        $_POST['email'] = 'gerry@gmail.com';
        $_POST['phoneNumber'] = '7864516918';
        $_POST['firstName'] = 'gerry';
        $_POST['lastName'] = 'gerry';



        require_once 'SignUpFormGetter.php';
        require_once 'SignUpFormInserter.php';
        $signUpFormGetter = new SignUpFormGetter();
        $signUpFormInserter = new SignUpFormInserter($signUpFormGetter);
        $signUpFormInserter->insert();
    }

    public function testRegistrationExisting(){
        //create and delete
        $_POST['username'] = 'gerry';
    }
    public function testSimpleTrue()
    {
        $this->assertTrue(true);
    }

    public function testSimpleFalse()
    {
        $this->assertFalse(true);
    }
}

?>