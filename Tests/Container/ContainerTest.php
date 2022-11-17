<?php

namespace Responder\Tests\Container;

use PHPUnit\Framework\TestCase;
use Responder\Container\Container;

class ContainerTest extends TestCase
{
    public function testResolvesBasicObject()
    {
        Container::singleton(TestClass::class);
        $this->assertEquals(new TestClass(), Container::singleton(TestClass::class));
    }

    public function testResolvesInterface()
    {
        Container::singleton(IntegerInterface::class, TestClass::class);
        $this->assertEquals(new TestClass(), Container::singleton(IntegerInterface::class));
    }

    public function testResolvesCallbackBuiltObject()
    {
        Container::singleton(StringInterface::class, fn () => new TestClass(8));
        $this->assertEquals(new TestClass(8), Container::singleton(StringInterface::class));
    }
}

interface IntegerInterface
{
    public function testInteger(): int;
}

interface StringInterface
{
    public function testString(): string;
}

class TestClass implements StringInterface, IntegerInterface
{
    protected int $integer;
    
    protected string $string;

    public function __construct(int $integer = 5, string $string = 'string')
    {
        $this->integer = $integer;
        $this->string = $string;
    }

    public function testString(): string
    {
        return $this->string;
    }

    public function testInteger(): int
    {
        return $this->integer;
    }
}
