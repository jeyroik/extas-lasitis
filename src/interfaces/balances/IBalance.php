<?php
namespace extas\interfaces\balances;

use extas\interfaces\IHasDescription;
use extas\interfaces\IHasName;
use extas\interfaces\IHasUpdatedAt;
use extas\interfaces\IHasValue;
use extas\interfaces\players\IHasPlayer;

/**
 * Interface IBalance
 *
 * @package extas\interfaces\balances
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IBalance extends IHasDescription, IHasPlayer, IHasValue, IHasUpdatedAt, IHasName
{
    public const SUBJECT = 'extas.balance';

    /**
     * @param float $increment
     * @return float
     */
    public function inc(float $increment): float;

    /**
     * @param float $decrement
     * @return float
     */
    public function dec(float $decrement): float;
}
