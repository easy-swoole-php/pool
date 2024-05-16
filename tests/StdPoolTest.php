<?php
/**
 * description
 * author: longhui.huang <1592328848@qq.com>
 * datetime: 2024/5/16 12:01
 */
declare(strict_types=1);

namespace EasySwoole\Pool\Tests;

use EasySwoole\Pool\Config;
use PHPUnit\Framework\TestCase;

final class StdPoolTest extends TestCase
{
    public function testPool()
    {
        $config = new Config();
        $pool   = new StdPool($config);
        $obj    = $pool->getObj();
        $obj2   = $pool->getObj();
        $this->assertIsInt($obj->who());
        $this->assertIsInt($obj2->who());
    }
}
