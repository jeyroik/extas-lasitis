<?php
namespace extas\components\plugins\transactions;

use extas\components\plugins\Plugin;
use extas\interfaces\IItem;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\stages\IStageCreateAfter;
use extas\interfaces\transactions\ITransaction;

/**
 * Class UpdateBalance
 *
 * @method IRepository balances()
 *
 * @package extas\components\plugins\transactions
 * @author jeyroik <jeyroik@gmail.com>
 */
class UpdateBalance extends Plugin implements IStageCreateAfter
{
    /**
     * @param IItem|ITransaction $createdItem
     * @param IItem $sourceItem
     * @param IRepository|null $repository
     */
    public function __invoke(IItem &$createdItem, IItem $sourceItem, IRepository $repository = null): void
    {
        $balance = $createdItem->getToBalance();
        $balance->inc($createdItem->getValue());
        $balance->setUpdatedAt(time());

        $this->balances()->update($balance);

        $balance = $createdItem->getFromBalance();
        $balance->dec($createdItem->getValue());
        $balance->setUpdatedAt(time());

        $this->balances()->update($balance);
    }
}
