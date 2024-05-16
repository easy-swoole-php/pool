<?php
/**
 * description
 * author: longhui.huang <1592328848@qq.com>
 * datetime: 2024/5/16 12:00
 */
declare(strict_types=1);

namespace EasySwoole\Pool\Tests;

use EasySwoole\Pool\AbstractPool;

class StdPool extends AbstractPool
{
    protected function createObject()
    {
        return new Std();
    }
}
