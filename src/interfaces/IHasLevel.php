<?php
namespace extas\interfaces;

/**
 * Interface IHasLevel
 *
 * @package extas\interfaces
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IHasLevel
{
    public const FIELD__LEVEL = 'level';

    /**
     * @return int
     */
    public function getLevel(): int;

    /**
     * @param int $level
     * @return $this
     */
    public function setLevel(int $level);

    /**
     * @param int $increment
     * @return int new level
     */
    public function incLevel(int $increment = 1): int;
}
