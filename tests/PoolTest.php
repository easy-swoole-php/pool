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

use EasySwoole\Pool\Config;
use EasySwoole\Pool\MagicPool;
use EasySwoole\Pool\Manager;
use PHPUnit\Framework\TestCase;

final class PoolTest extends TestCase
{
    public function testNormalClass()
    {
        $manager = Manager::getInstance()->register(new Pool(new Config()), 'test');
        /**
         * @var $obj Pool
         */
        $obj = $manager->get('test');
        $this->assertEquals(PoolObject::class, $obj->getObj()->get());
    }

    public function testNormalClass2()
    {
        $manager = Manager::getInstance()->register(new MagicPool(function () {
            return new PoolObject();
        }, new Config()), 'test');

        $pool = $manager->get('test');
        $obj  = $pool->getObj();

        $this->assertEquals(PoolObject::class, $obj->get());
        $this->assertEquals(true, $pool->recycleObj($obj));
        /**
         * @var $obj PoolObject
         */
        $obj   = $pool->getObj();
        $hash1 = $obj->__objHash;
        $this->assertEquals(PoolObject::class, $obj->get());
        $pool->recycleObj($obj);

        $obj   = $pool->getObj();
        $hash2 = $obj->__objHash;
        $pool->recycleObj($obj);
        $this->assertEquals($pool->status()['created'], 1);
        $this->assertEquals($hash1, $hash2);

        $pool->invoke(function (PoolObject $object) {
            $this->assertEquals(PoolObject::class, $object->get());
        });
    }

    public function testUnsetObj()
    {
        $manager = Manager::getInstance()->register(new MagicPool(function () {
            return new PoolObject(true);
        }, new Config()), 'test');
        $pool    = $manager->get('test');
        $obj     = $pool->getObj();
        $this->assertEquals(false, $pool->isInPool($obj));
        $pool->recycleObj($obj);
        $this->assertEquals(true, $pool->isInPool($obj));

        $manager = Manager::getInstance()->register(new MagicPool(function () {
            return new PoolObject();
        }, new Config()), 'test2');
        $pool    = $manager->get('test2');
        $obj     = $pool->getObj();
        $status  = $pool->status();
        $this->assertEquals(1, $status['created']);
        $this->assertEquals(1, $status['inuse']);

        $pool->recycleObj($obj);

        $status = $pool->status();
        $this->assertEquals(1, $status['created']);
        $this->assertEquals(0, $status['inuse']);
    }
}
