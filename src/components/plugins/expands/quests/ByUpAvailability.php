<?php
namespace extas\components\plugins\expands\quests;

use extas\components\exceptions\MissedOrUnknown;
use extas\components\plugins\Plugin;
use extas\interfaces\balances\IBalance;
use extas\interfaces\expands\IExpand;
use extas\interfaces\IItem;
use extas\interfaces\quests\IQuest;
use extas\interfaces\stages\IStageExpand;
use extas\interfaces\repositories\IRepository;

/**
 * Class ByUpAvailability
 *
 * @method IRepository balances()
 *
 * @package extas\components\plugins\expands\quests
 * @author jeyroik <jeyroik@gmail.com>
 */
class ByUpAvailability extends Plugin implements IStageExpand
{
    public const FIELD__ALLOW_UP = 'allow_up';

    /**
     * @param IItem|IQuest $subject
     * @param IExpand $expand
     * @return IItem
     * @throws MissedOrUnknown
     */
    public function __invoke(IItem $subject, IExpand $expand): IItem
    {
        /**
         * @var IBalance $balance
         */
        $schema = $subject->getLevelSchema();
        $balance = $this->balances()->one([IBalance::FIELD__NAME => $subject->getPlayerName()]);

        if (!$balance) {
            throw new MissedOrUnknown('balance');
        }

        $allowUp = true;

        if ($schema->getPrice($subject->getNextLevel()) > $balance->getValue()) {
            $allowUp = false;
        }

        if ($schema->getBalanceLevel($subject->getNextLevel()) > $balance->getLevel()) {
            $allowUp = false;
        }

        $subject[static::FIELD__ALLOW_UP] = $allowUp;

        return $subject;
    }
}
