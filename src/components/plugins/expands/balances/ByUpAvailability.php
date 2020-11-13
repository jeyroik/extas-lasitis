<?php
namespace extas\components\plugins\expands\balances;

use extas\components\plugins\Plugin;
use extas\interfaces\balances\IBalance;
use extas\interfaces\expands\IExpand;
use extas\interfaces\IItem;
use extas\interfaces\stages\IStageExpand;

/**
 * Class ByUpAvailability
 *
 * @package extas\components\plugins\expands\balances
 * @author jeyroik <jeyroik@gmail.com>
 */
class ByUpAvailability extends Plugin implements IStageExpand
{
    public const FIELD__ALLOW_UP = 'allow_up';

    /**
     * @param IItem|IBalance $subject
     * @param IExpand $expand
     * @return IItem
     */
    public function __invoke(IItem $subject, IExpand $expand): IItem
    {
        $schema = $subject->getLevelSchema();

        $allowUp = true;

        if ($schema->getPrice($subject->getNextLevel()) > $subject->getValue()) {
            $allowUp = false;
        }

        $subject[static::FIELD__ALLOW_UP] = $allowUp;

        return $subject;
    }
}
