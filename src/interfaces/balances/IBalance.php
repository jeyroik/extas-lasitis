<?php
namespace extas\interfaces\balances;

use extas\interfaces\IHasCreatedAt;
use extas\interfaces\IHasDescription;
use extas\interfaces\IHasLevel;
use extas\interfaces\IHasName;
use extas\interfaces\IHasType;
use extas\interfaces\IHasUpdatedAt;
use extas\interfaces\IHasValue;
use extas\interfaces\IItem;
use extas\interfaces\levels\IHasLevelSchema;
use extas\interfaces\players\IHasPlayer;

/**
 * Interface IBalance
 *
 * @package extas\interfaces\balances
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IBalance extends
    IItem,
    IHasDescription,
    IHasPlayer,
    IHasValue,
    IHasUpdatedAt,
    IHasCreatedAt,
    IHasName,
    IHasLevelSchema,
    IHasType
{
    public const SUBJECT = 'extas.balance';
    public const CHEST = '@chest';

    public const TYPE__PLAYER = 1;
    public const TYPE__QUEST = 2;

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
