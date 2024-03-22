<?php

use PHPUnit\Framework\TestCase;

class CollectTest extends TestCase
{
    // Методы из варианта 1
    public function testKeys()
    {
        // Тест на обычный ассоциативный массив
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertSame(['a', 'b', 'c'], $collect->keys()->toArray());

        // Тест на пустой массив
        $collect = new Collect\Collect([]);
        $this->assertSame([], $collect->keys()->toArray());

        // Тест на числовые ключи
        $collect = new Collect\Collect([1 => 'a', 2 => 'b', 3 => 'c']);
        $this->assertSame([1, 2, 3], $collect->keys()->toArray());
    }

    public function testValues()
    {
        // Тест на обычный ассоциативный массив
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $this->assertSame([1, 2, 3], $collect->values()->toArray());

        // Тест на пустой массив
        $collect = new Collect\Collect([]);
        $this->assertSame([], $collect->values()->toArray());

        // Тест на числовые значения
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
        // Тест на тип возвращаемого значения
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $result = $collect->except('a');
        $this->assertInstanceOf(Collect\Collect::class, $result);

        // Тест на количество элементов
        $resultArray = $result->toArray();
        $this->assertCount(2, $resultArray);

        // Проверка наличия исключенных ключей
        $this->assertArrayNotHasKey('a', $resultArray);
        $this->assertArrayHasKey('b', $resultArray);
        $this->assertArrayHasKey('c', $resultArray);

        //Тест на исключение всех ключей
        $result = $collect->except('a', 'b', 'c');
        $this->assertCount(0, $result->toArray());
    }

    // Методы из варианта 2
    public function testOnly()
    {
        // Создаю коллекцию с данными
        $data = ['a' => 1, 'b' => 2, 'c' => 3];
        $collect = new Collect\Collect($data);

        // Выбор только определенные элементы
        $filtered = $collect->only('a', 'b');

        // Проверяю, что возвращенная коллекция содержит только указанные элементы
        $this->assertSame(['a' => 1, 'b' => 2], $filtered->toArray());

        // Проверяю, что оригинальная коллекция осталась неизменной
        $this->assertSame($data, $collect->toArray());
    }


    public function testFirst()
    {
        // Создаю коллекцию с данными
        $data = ['a' => 1, 'b' => 2, 'c' => 3];
        $collect = new Collect\Collect($data);

        // Получаю первый элемент коллекции
        $firstElement = $collect->first();

        // Проверяю, что первый элемент соответствует ожидаемому
        $this->assertSame(1, $firstElement);

        // Проверяю, что оригинальная коллекция осталась неизменной
        $this->assertSame($data, $collect->toArray());
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
