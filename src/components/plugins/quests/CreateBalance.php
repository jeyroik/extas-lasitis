<?php
namespace extas\components\plugins\quests;

use extas\components\balances\Balance;
use extas\components\plugins\Plugin;
use extas\interfaces\IItem;
use extas\interfaces\levels\ILevelSchema;
use extas\interfaces\quests\IQuest;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\stages\IStageCreateBefore;

/**
 * Class CreateBalance
 *
 * @method IRepository balances()
 *
 * @package extas\components\plugins\quests
 * @author jeyroik <jeyroik@gmail.com>
 */
class CreateBalance extends Plugin implements IStageCreateBefore
{
    /**
     * @param IItem|IQuest $item
     * @param IRepository|null $repository
     */
    public function __invoke(IItem &$item, IRepository $repository = null): void
    {
        $this->balances()->create(new Balance([
            Balance::FIELD__NAME => $item->getName(),
            Balance::FIELD__TITLE => $item->getPlayer()->getTitle() . ' [' . $item->getTitle() . ']',
            Balance::FIELD__DESCRIPTION => $item->getPlayer()->getTitle() . ' [' . $item->getTitle() . ']',
            Balance::FIELD__VALUE => 0,
            Balance::FIELD__CREATED_AT => time(),
            Balance::FIELD__UPDATED_AT => time(),
            Balance::FIELD__LEVEL => 1,
            Balance::FIELD__LEVEL_SCHEMA_NAME => ILevelSchema::NAME__DEFAULT_BALANCE,
            Balance::FIELD__PLAYER_NAME => $item->getPlayerName(),
            Balance::FIELD__TYPE => Balance::TYPE__QUEST
        ]));

        $item->setBalanceName($item->getName());
    }
}
