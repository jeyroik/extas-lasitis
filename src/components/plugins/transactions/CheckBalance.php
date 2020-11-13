<?php
namespace extas\components\plugins\transactions;

use extas\components\plugins\Plugin;
use extas\interfaces\balances\IBalance;
use extas\interfaces\IItem;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\stages\IStageCreateBefore;
use extas\interfaces\transactions\ITransaction;

/**
 * Class CheckBalance
 *
 * @package extas\components\plugins\transactions
 * @author jeyroik <jeyroik@gmail.com>
 */
class CheckBalance extends Plugin implements IStageCreateBefore
{
    /**
     * @param IItem|ITransaction $item
     * @param IRepository|null $repository
     * @throws
     */
    public function __invoke(IItem &$item, IRepository $repository = null): void
    {
        if ($this->isNotApplicableTransaction($item)) {
            throw new \Exception('Not applicable transaction');
        }
    }

    /**
     * @param ITransaction $transaction
     * @return bool
     */
    protected function isNotApplicableTransaction(ITransaction $transaction): bool
    {
        $fromBalance = $transaction->getFromBalance();

        return !(
            $this->isNotChest($fromBalance) &&  $this->isEnoughBalance($fromBalance, $transaction)
            || $this->isPlayerBalance($fromBalance)
        );
    }

    /**
     * @param IBalance $balance
     * @param ITransaction $transaction
     * @return bool
     */
    protected function isEnoughBalance(IBalance $balance, ITransaction $transaction): bool
    {
        return $balance->getValue() >= $transaction->getValue();
    }

    /**
     * @param IBalance $balance
     * @return bool
     */
    protected function isPlayerBalance(IBalance $balance): bool
    {
        return $balance->getType() == IBalance::TYPE__PLAYER;
    }

    /**
     * @param IBalance $balance
     * @return bool
     */
    protected function isNotChest(IBalance $balance): bool
    {
        return $balance->getName() !== IBalance::CHEST;
    }
}
