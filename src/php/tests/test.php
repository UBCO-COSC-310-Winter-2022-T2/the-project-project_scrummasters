<?php
use PHPUnit\Framework\TestCase;
class phpUnitTest extends TestCase
{
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