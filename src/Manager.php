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

use EasySwoole\Component\Singleton;

class Manager
{
    use Singleton;

    protected $container = [];

    public function register(AbstractPool $pool, string $name = null): Manager
    {
        if ($name === null) {
            $name = get_class($pool);
        }

        $this->container[$name] = $pool;
        return $this;
    }

    public function get(string $name): ?AbstractPool
    {
        if (isset($this->container[$name])) {
            return $this->container[$name];
        }

        return null;
    }

    public function resetAll()
    {
        /** @var AbstractPool $item */
        foreach ($this->container as $item) {
            $item->destroy();
        }
    }
}
