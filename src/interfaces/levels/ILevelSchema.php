<?php
namespace extas\interfaces\levels;

use extas\interfaces\IHasName;
use extas\interfaces\samples\parameters\IHasSampleParameters;

/**
 * Interface ILevelSchema
 *
 * @package extas\interfaces\levels
 * @author jeyroik <jeyroik@gmail.com>
 */
interface ILevelSchema extends IHasName, IHasSampleParameters
{
    public const SUBJECT = 'extas.level.schema';

    public const PARAM__MULTIPLICATOR = 'm';

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
