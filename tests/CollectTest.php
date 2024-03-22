<?php

use PHPUnit\Framework\TestCase;

class CollectTest extends TestCase
{
    // Методы из варианта 1
    public function testKeys()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertSame(['a', 'b', 'c'], $collect->keys()->toArray());
    }

    public function testValues()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertSame([1, 2, 3], $collect->values()->toArray());
    }

    public function testGet()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertSame(2, $collect->get('b'));
    }

    public function testExcept()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertSame(['b' => 2, 'c' => 3], $collect->except('a')->toArray());
    }

    // Методы из варианта 2
    public function testOnly()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertSame(['a' => 1, 'b' => 2], $collect->only('a', 'b')->toArray());
    }

    public function testFirst()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertSame(1, $collect->first());
    }

    public function testCount()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertSame(3, $collect->count());
    }

    public function testToArray()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertSame(['a' => 1, 'b' => 2, 'c' => 3], $collect->toArray());
    }

    // Методы из варианта 3
    public function testPush()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $collect->push(4);
        $this->assertSame(['a' => 1, 'b' => 2, 'c' => 3, 4], $collect->toArray());
    }

    public function testUnshift()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $collect->unshift(0);
        $this->assertSame([0, 'a' => 1, 'b' => 2, 'c' => 3], $collect->toArray());
    }

    public function testShift()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $collect->shift();
        $this->assertSame(['b' => 2, 'c' => 3], $collect->toArray());
    }

    // Методы из варианта 4
    public function testPop()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $collect->pop();
        $this->assertSame(['a' => 1, 'b' => 2], $collect->toArray());
    }

    public function testSplice()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $collect->splice(1, 1);
        $this->assertSame(['a' => 1, 'c' => 3], $collect->toArray());
    }
}
