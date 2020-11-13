<?php
namespace extas\components;

use extas\interfaces\IHasLevel;

/**
 * Trait THasLevel
 *
 * @property array $config
 *
 * @package extas\components
 * @author jeyroik <jeyroik@gmail.com>
 */
trait THasLevel
{
    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->config[IHasLevel::FIELD__LEVEL] ?? 0;
    }

    /**
     * @return int
     */
    public function getNextLevel(): int
    {
        return $this->getLevel()+1;
    }

    /**
     * @param int $level
     * @return $this
     */
    public function setLevel(int $level)
    {
        $this->config[IHasLevel::FIELD__LEVEL] = $level;

        return $this;
    }

    /**
     * @param int $increment
     * @return int
     */
    public function incLevel(int $increment = 1): int
    {
        $this->setLevel($this->getLevel() + $increment);

        return $this->getLevel();
    }
}
