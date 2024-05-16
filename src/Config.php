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

use EasySwoole\Pool\Exception\Exception;
use EasySwoole\Spl\SplBean;

class Config extends SplBean
{
    protected $intervalCheckTime = 10 * 1000;
    protected $maxIdleTime       = 15;
    protected $maxObjectNum      = 20;
    protected $minObjectNum      = 5;
    protected $getObjectTimeout  = 3.0;
    protected $loadAverageTime   = 0.001;

    protected $extraConf;

    /**
     * @return float|int
     */
    public function getIntervalCheckTime()
    {
        return $this->intervalCheckTime;
    }

    /**
     * @param float|int $intervalCheckTime
     *
     * @return Config
     */
    public function setIntervalCheckTime($intervalCheckTime): Config
    {
        $this->intervalCheckTime = $intervalCheckTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxIdleTime(): int
    {
        return $this->maxIdleTime;
    }

    /**
     * @param int $maxIdleTime
     *
     * @return $this
     */
    public function setMaxIdleTime(int $maxIdleTime): Config
    {
        $this->maxIdleTime = $maxIdleTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxObjectNum(): int
    {
        return $this->maxObjectNum;
    }

    /**
     * @param int $maxObjectNum
     *
     * @return $this
     * @throws Exception
     */
    public function setMaxObjectNum(int $maxObjectNum): Config
    {
        if ($this->minObjectNum >= $maxObjectNum) {
            throw new Exception('min num is bigger than max');
        }

        $this->maxObjectNum = $maxObjectNum;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinObjectNum(): int
    {
        return $this->minObjectNum;
    }

    /**
     * @param int $minObjectNum
     *
     * @return $this
     * @throws Exception
     */
    public function setMinObjectNum(int $minObjectNum): Config
    {
        if ($minObjectNum >= $this->maxObjectNum) {
            throw new Exception('min num is bigger than max');
        }

        $this->minObjectNum = $minObjectNum;
        return $this;
    }

    /**
     * @return float
     */
    public function getGetObjectTimeout(): float
    {
        return $this->getObjectTimeout;
    }

    /**
     * @param float $getObjectTimeout
     *
     * @return $this
     */
    public function setGetObjectTimeout(float $getObjectTimeout): Config
    {
        $this->getObjectTimeout = $getObjectTimeout;
        return $this;
    }

    /**
     * @return float
     */
    public function getLoadAverageTime(): float
    {
        return $this->loadAverageTime;
    }

    /**
     * @param float $loadAverageTime
     *
     * @return $this
     */
    public function setLoadAverageTime(float $loadAverageTime): Config
    {
        $this->loadAverageTime = $loadAverageTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtraConf()
    {
        return $this->extraConf;
    }

    /**
     * @param $extraConf
     *
     * @return $this
     */
    public function setExtraConf($extraConf): Config
    {
        $this->extraConf = $extraConf;
        return $this;
    }
}
