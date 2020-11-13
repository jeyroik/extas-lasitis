<?php
namespace extas\components\plugins\expands\transactions;

use extas\components\plugins\Plugin;
use extas\interfaces\expands\IExpand;
use extas\interfaces\IItem;
use extas\interfaces\stages\IStageExpand;
use extas\interfaces\transactions\ITransaction;

/**
 * Class ByToExpand
 *
 * @package extas\components\plugins\expands\transactions
 * @author jeyroik <jeyroik@gmail.com>
 */
class ByToExpand extends Plugin implements IStageExpand
{
    /**
     * @param IItem|ITransaction $subject
     * @param IExpand $expand
     * @return IItem
     */
    public function __invoke(IItem $subject, IExpand $expand): IItem
    {
        $subject['to_balance_object'] = $subject->getToBalance()->__toArray();

        return $subject;
    }
}
