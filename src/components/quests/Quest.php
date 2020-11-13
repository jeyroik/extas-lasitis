<?php
namespace extas\components\quests;

use extas\components\balances\THasBalance;
use extas\components\quests\samples\QuestSample;
use extas\interfaces\quests\IQuest;

/**
 * Class Quest
 *
 * @package extas\components\quests
 * @author jeyroik <jeyroik@gmail.com>
 */
class Quest extends QuestSample implements IQuest
{
    use THasBalance;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'extas.quest';
    }
}
