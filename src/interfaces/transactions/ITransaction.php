<?php
namespace extas\interfaces\transactions;

use extas\interfaces\IHasCreatedAt;
use extas\interfaces\IHasId;
use extas\interfaces\IHasValue;
use extas\interfaces\IItem;
use extas\interfaces\Balances\IBalance;

/**
 * Interface ITransaction
 *
 * @package extas\interfaces\transactions
 * @author jeyroik <jeyroik@gmail.com>
 */
interface ITransaction extends IItem, IHasCreatedAt, IHasValue, IHasId
{
    public const SUBJECT = 'extas.transaction';

    public const FIELD__FROM_BALANCE = 'from_balance';
    public const FIELD__TO_BALANCE = 'to_balance';
    public const FIELD__COMMENT = 'comment';

    /**
     * @return string
     */
    public function getFromBalanceName(): string;

    /**
     * @return IBalance|null
     */
    public function getFromBalance(): ?IBalance;

    /**
     * @return string
     */
    public function getToBalanceName(): string;

    /**
     * @return IBalance|null
     */
    public function getToBalance(): ?IBalance;

    /**
     * @return string
     */
    public function getComment(): string;

    /**
     * @param string $name
     * @return $this
     */
    public function setFromBalanceName(string $name);

    /**
     * @param string $name
     * @return $this
     */
    public function setToBalanceName(string $name);

    /**
     * @param string $comment
     * @return $this
     */
    public function setComment(string $comment);
}
