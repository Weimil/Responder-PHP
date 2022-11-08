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
        Container::singleton(TestInterface::class, TestClass::class);
        $this->assertEquals(new TestClass(), Container::singleton(TestInterface::class));
    }

    public function testResolvesCallbackBuiltObject()
    {
        Container::singleton(TestTestInterface::class, fn () => new TestClass(8));
        $this->assertEquals(new TestClass(8), Container::singleton(TestTestInterface::class));
    }
}

interface TestInterface
{
    public function testFunction(): int;
}

interface TestTestInterface
{
    public function testTestFunction(): int;
}

class TestClass implements TestInterface, TestTestInterface
{
    protected int $test;

    public function __construct(int $test = 5)
    {
        $this->test = $test;
    }

    public function testFunction(): int
    {
        return $this->test;
    }

    public function testTestFunction(): int
    {
        return $this->test;
    }
}
