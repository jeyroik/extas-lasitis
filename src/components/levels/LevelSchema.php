<?php
namespace extas\components\levels;

use extas\components\Item;
use extas\components\samples\parameters\THasSampleParameters;
use extas\components\THasName;
use extas\interfaces\levels\ILevelSchema;

/**
 * Class LevelSchema
 *
 * @package extas\components\levels
 * @author jeyroik <jeyroik@gmail.com>
 */
class LevelSchema extends Item implements ILevelSchema
{
    use THasName;
    use THasSampleParameters;

    /**
     * @param int $level
     * @return int
     */
    public function getBalanceLevel(int $level): int
    {
        $mParam = $this->getParameterValue(static::PARAM__BALANCE_LEVEL, []);

        return $mParam[$level] ?? 0;
    }

    /**
     * @param int $level
     * @param int $l
     * @return $this|LevelSchema
     * @throws \Exception
     */
    public function setBalanceLevel(int $level, int $l)
    {
        $mParam = $this->getParameterValue(static::PARAM__BALANCE_LEVEL, []);
        $mParam[$level] = $l;
        $this->setParameterValue(static::PARAM__BALANCE_LEVEL, $mParam);

        return $this;
    }

    /**
     * @param int $level
     * @return int
     */
    public function getPrice(int $level): int
    {
        $mParam = $this->getParameterValue(static::PARAM__PRICE, []);

        return $mParam[$level] ?? 0;
    }

    /**
     * @param int $level
     * @param int $p
     * @return $this|LevelSchema
     * @throws \Exception
     */
    public function setPrice(int $level, int $p)
    {
        $mParam = $this->getParameterValue(static::PARAM__PRICE, []);
        $mParam[$level] = $p;
        $this->setParameterValue(static::PARAM__PRICE, $mParam);

        return $this;
    }

    /**
     * @param int $level
     * @return int
     */
    public function getMultiplicator(int $level): int
    {
        $mParam = $this->getParameterValue(static::PARAM__MULTIPLICATOR, []);

        return $mParam[$level] ?? 0;
    }

    /**
     * @param int $level
     * @param int $m
     * @return $this|LevelSchema
     * @throws \Exception
     */
    public function setMultiplicator(int $level, int $m)
    {
        $mParam = $this->getParameterValue(static::PARAM__MULTIPLICATOR, []);
        $mParam[$level] = $m;
        $this->setParameterValue(static::PARAM__MULTIPLICATOR, $mParam);

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
