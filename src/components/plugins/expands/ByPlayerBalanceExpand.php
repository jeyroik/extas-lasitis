<?php
namespace extas\components\plugins\expands;

use extas\components\plugins\Plugin;
use extas\interfaces\balances\IBalance;
use extas\interfaces\expands\IExpand;
use extas\interfaces\IItem;
use extas\interfaces\players\IHasPlayer;
use extas\interfaces\stages\IStageExpand;
use extas\interfaces\repositories\IRepository;

/**
 * Class ByPlayerBalanceExpand
 *
 * @method IRepository balances()
 *
 * @package extas\components\plugins\expands
 * @author jeyroik <jeyroik@gmail.com>
 */
class ByPlayerBalanceExpand extends Plugin implements IStageExpand
{
    /**
     * @param IItem|IHasPlayer $subject
     * @param IExpand $expand
     * @return IItem
     */
    public function __invoke(IItem $subject, IExpand $expand): IItem
    {
        /**
         * Get only master balance.
         */
        $balance = $this->balances()->one([IBalance::FIELD__NAME => $subject->getPlayerName()]);

        if ($balance) {
            $subject['player_balance'] = $balance->__toArray();
        }

        return $subject;
    }
}
