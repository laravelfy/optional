<?php

namespace Laravelfy\Optional\Tests\Support;

/**
 * 测试用的对象
 */
class ObjTest
{
    public function testMethod($param)
    {
        return $param;
    }

    public function testObject()
    {
        return $this;
    }
}
