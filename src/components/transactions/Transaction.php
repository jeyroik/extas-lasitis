<?php
namespace extas\components\transactions;

use extas\components\Item;
use extas\components\THasCreatedAt;
use extas\components\THasId;
use extas\components\THasValue;
use extas\interfaces\balances\IBalance;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\transactions\ITransaction;

/**
 * Class Transaction
 *
 * @method IRepository balances()
 *
 * @package extas\components\transactions
 * @author jeyroik <jeyroik@gmail.com>
 */
class Transaction extends Item implements ITransaction
{
    use THasCreatedAt;
    use THasValue;
    use THasId;

    /**
     * @return string
     */
    public function getFromBalanceName(): string
    {
        return $this->config[static::FIELD__FROM_BALANCE] ?? '';
    }

    /**
     * @return IBalance|null
     */
    public function getFromBalance(): ?IBalance
    {
        return $this->balances()->one([IBalance::FIELD__NAME => $this->getFromBalanceName()]);
    }

    /**
     * @return string
     */
    public function getToBalanceName(): string
    {
        return $this->config[static::FIELD__TO_BALANCE] ?? '';
    }

    /**
     * @return IBalance|null
     */
    public function getToBalance(): ?IBalance
    {
        return $this->balances()->one([IBalance::FIELD__NAME => $this->getToBalanceName()]);
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->config[static::FIELD__COMMENT] ?? '';
    }

    /**
     * @param string $name
     * @return $this|Transaction
     */
    public function setFromBalanceName(string $name)
    {
        $this->config[static::FIELD__FROM_BALANCE] = $name;

        return $this;
    }

    /**
     * @param string $name
     * @return $this|Transaction
     */
    public function setToBalanceName(string $name)
    {
        $this->config[static::FIELD__TO_BALANCE] = $name;

        return $this;
    }

    /**
     * @param string $comment
     * @return $this|Transaction
     */
    public function setComment(string $comment)
    {
        $this->config[static::FIELD__COMMENT] = $comment;

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
