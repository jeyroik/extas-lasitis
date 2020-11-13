<?php
namespace extas\interfaces\quests\samples;

use extas\interfaces\IDispatcherWrapper;
use extas\interfaces\IHasCreatedAt;
use extas\interfaces\IHasUpdatedAt;
use extas\interfaces\IHasValue;
use extas\interfaces\IItem;
use extas\interfaces\levels\IHasLevelSchema;
use extas\interfaces\players\IHasPlayer;
use extas\interfaces\samples\parameters\IHasSampleParameters;

/**
 * Interface IQuestSample
 *
 * @package extas\interfaces\quests\samples
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IQuestSample extends
    IItem,
    IDispatcherWrapper,
    IHasPlayer,
    IHasSampleParameters,
    IHasLevelSchema,
    IHasValue,
    IHasUpdatedAt,
    IHasCreatedAt
{
    public const SUBJECT = 'extas.quest.sample';
}
