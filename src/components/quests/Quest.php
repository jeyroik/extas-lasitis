<?php
namespace extas\components\quests;

use extas\components\Item;
use extas\components\players\THasPlayer;
use extas\components\THasDescription;
use extas\components\THasLevel;
use extas\components\THasName;
use extas\components\THasValue;
use extas\interfaces\quests\IQuest;

/**
 * Class Quest
 *
 * @package extas\components\quests
 * @author jeyroik <jeyroik@gmail.com>
 */
class Quest extends Item implements IQuest
{
    use THasName;
    use THasDescription;
    use THasPlayer;
    use THasLevel;
    use THasValue;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
