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

class MagicPool extends AbstractPool
{
    protected $func;

    public function __construct(callable $func, Config $conf = null)
    {
        $this->func = $func;

        if ($conf == null) {
            $conf = new Config();
        }

        parent::__construct($conf);
    }

    protected function createObject()
    {
        return call_user_func($this->func, $this->getConfig());
    }
}
