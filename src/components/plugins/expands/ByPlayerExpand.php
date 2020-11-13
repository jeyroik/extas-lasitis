<?php
namespace extas\components\plugins\expands;

use extas\components\plugins\Plugin;
use extas\interfaces\expands\IExpand;
use extas\interfaces\IItem;
use extas\interfaces\players\IHasPlayer;
use extas\interfaces\stages\IStageExpand;

/**
 * Class ByPlayerExpand
 *
 * @package extas\components\plugins\expands
 * @author jeyroik <jeyroik@gmail.com>
 */
class ByPlayerExpand extends Plugin implements IStageExpand
{
    /**
     * @param IItem|IHasPlayer $subject
     * @param IExpand $expand
     * @return IItem
     */
    public function __invoke(IItem $subject, IExpand $expand): IItem
    {
        $subject['player'] = $subject->getPlayer()->__toArray();

        return $subject;
    }
}
