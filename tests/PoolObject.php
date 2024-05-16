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

class PoolObject implements ObjectInterface
{
    protected $isOk = true;
    public $__objHash;

    public function __construct()
    {
        var_dump('create');
    }

    public function get()
    {
        return self::class;
    }

    public function gc()
    {
        var_dump("gc");
    }

    public function objectRestore()
    {
        var_dump('restore');
    }

    public function beforeUse(): ?bool
    {
        var_dump('beforeUse');
        return $this->isOk;
    }

    /**
     * @return bool
     */
    public function isOk(): bool
    {
        return $this->isOk;
    }

    /**
     * @param bool $isOk
     */
    public function setIsOk(bool $isOk): void
    {
        $this->isOk = $isOk;
    }
}
