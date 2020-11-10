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
