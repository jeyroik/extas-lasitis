<?php
namespace extas\components\plugins\expands;

use extas\components\plugins\Plugin;
use extas\interfaces\expands\IExpand;
use extas\interfaces\IItem;
use extas\interfaces\levels\IHasLevelSchema;
use extas\interfaces\stages\IStageExpand;

/**
 * Class ByLevelSchemaExpand
 *
 * @package extas\components\plugins\expands
 * @author jeyroik <jeyroik@gmail.com>
 */
class ByLevelSchemaExpand extends Plugin implements IStageExpand
{
    /**
     * @param IItem|IHasLevelSchema $subject
     * @param IExpand $expand
     * @return IItem
     */
    public function __invoke(IItem $subject, IExpand $expand): IItem
    {
        $subject['level_schema_object'] = $subject->getLevelSchema()->__toArray();

        return $subject;
    }
}
