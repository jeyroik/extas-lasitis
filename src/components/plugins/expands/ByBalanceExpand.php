<?php
namespace extas\components\plugins\expands;

use extas\components\plugins\Plugin;
use extas\interfaces\balances\IHasBalance;
use extas\interfaces\expands\IExpand;
use extas\interfaces\IItem;
use extas\interfaces\stages\IStageExpand;

/**
 * Class ByBalanceExpand
 *
 * @package extas\components\plugins\expands
 * @author jeyroik <jeyroik@gmail.com>
 */
class ByBalanceExpand extends Plugin implements IStageExpand
{
    /**
     * @param IItem|IHasBalance $subject
     * @param IExpand $expand
     * @return IItem
     */
    public function __invoke(IItem $subject, IExpand $expand): IItem
    {
        $subject['balance'] = $subject->getBalance()->__toArray();

        return $subject;
    }
}
