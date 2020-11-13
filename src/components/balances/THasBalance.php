<?php
namespace extas\components\balances;

use extas\interfaces\balances\IBalance;
use extas\interfaces\balances\IHasBalance;
use extas\interfaces\repositories\IRepository;

/**
 * Trait THasBalance
 *
 * @property array $config
 * @method IRepository balances()
 *
 * @package extas\components\balances
 * @author jeyroik <jeyroik@gmail.com>
 */
trait THasBalance
{
    /**
     * @return string
     */
    public function getBalanceName(): string
    {
        return $this->config[IHasBalance::FIELD__BALANCE_NAME] ?? '';
    }

    /**
     * @return IBalance|null
     */
    public function getBalance(): ?IBalance
    {
        return $this->balances()->one([IBalance::FIELD__NAME => $this->getBalanceName()]);
    }

    /**
     * @param string $balanceName
     * @return $this
     */
    public function setBalanceName(string $balanceName)
    {
        $this->config[IHasBalance::FIELD__BALANCE_NAME] = $balanceName;

        return $this;
    }
}
