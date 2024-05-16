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

namespace EasySwoole\Pool;

interface ObjectInterface
{
    // unset 的时候执行
    public function gc();

    // 使用后,free的时候会执行
    public function objectRestore();

    // 使用前调用,当返回true，表示该对象可用。返回false，该对象失效，需要回收
    public function beforeUse(): ?bool;
}
