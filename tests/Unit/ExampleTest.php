<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testBasicFunctionality(): void
    {
        // Пример проверки правильности работы функции
        $result = 1 + 1;
        $this->assertEquals(2, $result);
    }
}
