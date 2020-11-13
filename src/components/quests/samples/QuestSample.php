<?php
namespace extas\components\quests\samples;

use extas\components\Item;
use extas\components\levels\THasLevelSchema;
use extas\components\players\THasPlayer;
use extas\components\samples\parameters\THasSampleParameters;
use extas\components\TDispatcherWrapper;
use extas\components\THasUpdatedAt;
use extas\components\THasValue;
use extas\interfaces\quests\samples\IQuestSample;

/**
 * Class QuestSample
 *
 * @package extas\components\quests\samples
 * @author jeyroik <jeyroik@gmail.com>
 */
class QuestSample extends Item implements IQuestSample
{
    use TDispatcherWrapper;
    use THasPlayer;
    use THasSampleParameters;
    use THasValue;
    use THasUpdatedAt;
    use THasLevelSchema;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
