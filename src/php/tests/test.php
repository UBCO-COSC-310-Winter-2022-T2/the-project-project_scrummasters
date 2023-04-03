<?php
use PHPUnit\Framework\TestCase;
class phpUnitTest extends TestCase
{
    public function testSimpleTrue()
    {
        $this->assertTrue(true);
    }

    public function testCreateUser(){
        require_once 'SignUpFormGetter.php';
        require_once 'SignUpFormInserter.php';
        $signUpFormGetter = new SignUpFormGetter();
        $signUpFormInserter = new SignUpFormInserter($signUpFormGetter);
        $signUpFormInserter->insert();
        header("Location: ../../../html/loginform.html");
    }

    public function testSimpleFalse()
    {
        $this->assertFalse(true);
    }
}

?>