<?php
namespace extas\interfaces\balances;

/**
 * Interface IHasBalance
 *
 * @package extas\interfaces\balances
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IHasBalance
{
    public const FIELD__BALANCE_NAME = 'balance_name';

    /**
     * @return string
     */
    public function getBalanceName(): string;

    /**
     * @return IBalance|null
     */
    public function getBalance(): ?IBalance;

    /**
     * @param string $balanceName
     * @return $this
     */
    public function setBalanceName(string $balanceName);
}
