<?php
use PHPUnit\Framework\TestCase;
class helloTest extends TestCase
{
    public function testSimpleTrue()
    {
        $this->assertTrue(true);
    }

    public function testSimpleFalse()
    {
        $this->assertFalse(false);
    }
}