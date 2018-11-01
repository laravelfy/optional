<?php

namespace Laravelfy\Optional\Tests;

use PHPUnit\Framework\TestCase;
use Laravelfy\Optional\Tests\Support\ObjTest;

class BaseTest extends TestCase
{
    public function testStringEquals()
    {
        $this->assertEquals((string) optional2(1), (string) 1);
    }

    public function testArrayEquals()
    {
        $this->assertEquals((array) optional2([1]), [1]);
    }

    public function testMagicChain()
    {
        $this->assertEquals((string) 1, (string) optional2(new ObjTest())->testObject()->testMethod(1));
    }

    public function testArrayChain()
    {
        $this->assertEquals((string) 1, (string) optional2(['a' => ['b' => ['c' => 1]]])->a->b->c);
    }
}
