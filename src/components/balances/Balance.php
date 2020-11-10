<?php
namespace extas\components\balances;

use extas\components\Item;
use extas\components\players\THasPlayer;
use extas\components\THasDescription;
use extas\components\THasName;
use extas\components\THasUpdatedAt;
use extas\components\THasValue;
use extas\interfaces\balances\IBalance;

/**
 * Class Balance
 *
 * @package extas\components\balances
 * @author jeyroik <jeyroik@gmail.com>
 */
class Balance extends Item implements IBalance
{
    use THasUpdatedAt;
    use THasDescription;
    use THasValue;
    use THasPlayer;
    use THasName;

    /**
     * @param float $increment
     * @return float
     */
    public function inc(float $increment): float
    {
        $this->setValue($this->getValue(0) + $increment);

        return $this->getValue();
    }

    /**
     * @param float $decrement
     * @return float
     */
    public function dec(float $decrement): float
    {
        return $this->inc(-$decrement);
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
