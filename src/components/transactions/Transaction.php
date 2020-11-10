<?php
namespace extas\components\transactions;

use extas\components\Item;
use extas\components\THasCreatedAt;
use extas\components\THasId;
use extas\components\THasValue;
use extas\interfaces\players\IPlayer;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\transactions\ITransaction;

/**
 * Class Transaction
 *
 * @method IRepository players()
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
    public function getFromPlayerName(): string
    {
        return $this->config[static::FIELD__FROM_PLAYER] ?? '';
    }

    /**
     * @return IPlayer|null
     */
    public function getFromPlayer(): ?IPlayer
    {
        return $this->players()->one([IPlayer::FIELD__NAME => $this->getFromPlayerName()]);
    }

    /**
     * @return string
     */
    public function getToPlayerName(): string
    {
        return $this->config[static::FIELD__TO_PLAYER] ?? '';
    }

    /**
     * @return IPlayer|null
     */
    public function getToPlayer(): ?IPlayer
    {
        return $this->players()->one([IPlayer::FIELD__NAME => $this->getToPlayerName()]);
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
    public function setFromPlayerName(string $name)
    {
        $this->config[static::FIELD__FROM_PLAYER] = $name;

        return $this;
    }

    /**
     * @param string $name
     * @return $this|Transaction
     */
    public function setToPlayerName(string $name)
    {
        $this->config[static::FIELD__TO_PLAYER] = $name;

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
