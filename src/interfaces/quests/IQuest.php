<?php
namespace extas\interfaces\quests;

use extas\interfaces\IHasDescription;
use extas\interfaces\IHasLevel;
use extas\interfaces\IHasName;
use extas\interfaces\IHasValue;
use extas\interfaces\players\IHasPlayer;

/**
 * Interface IQuest
 *
 * @package extas\interfaces\quests
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IQuest extends IHasName, IHasDescription, IHasPlayer, IHasValue, IHasLevel
{
    public const SUBJECT = 'extas.quest';
}
