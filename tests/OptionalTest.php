<?php

use PHPUnit\Framework\TestCase;
use ww0rm\optional\Optional;

class OptionalTest extends TestCase
{
    public function testWithObject()
    {
        $object = new TestFixture("real object");
        $optional = Optional::of($object);

        $this->assertTrue($optional->isPresent());
        $this->assertEquals($object, $optional->get());
        $this->assertEquals($object, $optional->orElse(new TestFixture("fake object")));
    }

    public function testWithNull()
    {
        $optional = Optional::of(null);

        $this->assertFalse($optional->isPresent());
        $this->assertEquals(null, $optional->get());
        $this->assertEquals(new TestFixture("fake object"), $optional->orElse(new TestFixture("fake object")));
    }
}

class TestFixture
{
    public $message;

    function __construct(string $message)
    {
        $this->message = $message;
    }
}