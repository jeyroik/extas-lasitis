<?php
namespace extas\interfaces\levels;

use extas\interfaces\IHasLevel;
use extas\interfaces\IHasName;
use extas\interfaces\IItem;
use extas\interfaces\samples\parameters\IHasSampleParameters;

/**
 * Interface ILevelSchema
 *
 * @package extas\interfaces\levels
 * @author jeyroik <jeyroik@gmail.com>
 */
interface ILevelSchema extends IItem, IHasName, IHasSampleParameters, IHasLevel
{
    public const SUBJECT = 'extas.level.schema';

    public const PARAM__MULTIPLICATOR = 'm';
    public const PARAM__PRICE = 'price';
    public const PARAM__BALANCE_LEVEL = 'bl';

    public const NAME__DEFAULT = 'default';
    public const NAME__DEFAULT_BALANCE = 'default_balance';

    /**
     * @return int
     */
    public function getBalanceLevel(int $level): int;

    /**
     * @param int $l
     * @return $this
     */
    public function setBalanceLevel(int $level, int $l);

    /**
     * @return int
     */
    public function getPrice(int $level): int;

    /**
     * @param int $p
     * @return $this
     */
    public function setPrice(int $level, int $p);

    /**
     * @return int
     */
    public function getMultiplicator(int $level): int;

    /**
     * @param int $m
     * @return $this
     */
    public function setMultiplicator(int $level, int $m);
}
