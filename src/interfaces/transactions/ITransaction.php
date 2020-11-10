<?php
namespace extas\interfaces\transactions;

use extas\interfaces\IHasCreatedAt;
use extas\interfaces\IHasId;
use extas\interfaces\IHasValue;
use extas\interfaces\players\IPlayer;

/**
 * Interface ITransaction
 *
 * @package extas\interfaces\transactions
 * @author jeyroik <jeyroik@gmail.com>
 */
interface ITransaction extends IHasCreatedAt, IHasValue, IHasId
{
    public const SUBJECT = 'extas.transaction';

    public const FIELD__FROM_PLAYER = 'from_player';
    public const FIELD__TO_PLAYER = 'to_player';
    public const FIELD__COMMENT = 'comment';

    /**
     * @return string
     */
    public function getFromPlayerName(): string;

    /**
     * @return IPlayer|null
     */
    public function getFromPlayer(): ?IPlayer;

    /**
     * @return string
     */
    public function getToPlayerName(): string;

    /**
     * @return IPlayer|null
     */
    public function getToPlayer(): ?IPlayer;

    /**
     * @return string
     */
    public function getComment(): string;

    /**
     * @param string $name
     * @return $this
     */
    public function setFromPlayerName(string $name);

    /**
     * @param string $name
     * @return $this
     */
    public function setToPlayerName(string $name);

    /**
     * @param string $comment
     * @return $this
     */
    public function setComment(string $comment);
}
