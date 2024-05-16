<?php
/**
 * This file is part of EasySwoole.
 *
 * @link     https://www.easyswoole.com
 * @document https://www.easyswoole.com
 * @contact  https://www.easyswoole.com/Preface/contact.html
 * @license  https://github.com/easy-swoole/easyswoole/blob/3.x/LICENSE
 */
declare(strict_types=1);

namespace EasySwoole\Pool\Tests;

use EasySwoole\Pool\ObjectInterface;

class Std implements ObjectInterface
{
    public function gc()
    {
        /*
         * 本对象被pool执行unset的时候
         */
    }

    public function objectRestore()
    {
        /*
         * 回归到连接池的时候
         */
    }

    public function beforeUse(): ?bool
    {
        /*
         * 取出连接池的时候，若返回false，则当前对象被弃用回收
         */
        return true;
    }

    public function who()
    {
        return spl_object_id($this);
    }
}
