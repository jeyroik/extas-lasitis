<?php
namespace extas\interfaces\quests;

use extas\interfaces\balances\IHasBalance;
use extas\interfaces\quests\samples\IQuestSample;

/**
 * Interface IQuest
 *
 * @package extas\interfaces\quests
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IQuest extends IQuestSample, IHasBalance
{
}
