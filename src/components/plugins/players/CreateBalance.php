<?php
namespace extas\components\plugins\players;

use extas\components\balances\Balance;
use extas\components\plugins\Plugin;
use extas\interfaces\IItem;
use extas\interfaces\levels\ILevelSchema;
use extas\interfaces\players\IPlayer;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\stages\IStageCreateAfter;

/**
 * Class CreateBalance
 *
 * @method IRepository balances()
 *
 * @package extas\components\plugins\players
 * @author jeyroik <jeyroik@gmail.com>
 */
class CreateBalance extends Plugin implements IStageCreateAfter
{
    /**
     * @param IItem|IPlayer $createdItem
     * @param IItem $sourceItem
     * @param IRepository|null $repository
     */
    public function __invoke(IItem &$createdItem, IItem $sourceItem, IRepository $repository = null): void
    {
        $this->balances()->create(new Balance([
            Balance::FIELD__NAME => $createdItem->getName(),
            Balance::FIELD__TITLE => $createdItem->getTitle() . ' - Основной',
            Balance::FIELD__DESCRIPTION => $createdItem->getTitle() . ' - Основной счёт. Создан автоматически',
            Balance::FIELD__LEVEL => 1,
            Balance::FIELD__VALUE => 0,
            Balance::FIELD__PLAYER_NAME => $createdItem->getName(),
            Balance::FIELD__CREATED_AT => time(),
            Balance::FIELD__UPDATED_AT => time(),
            Balance::FIELD__LEVEL_SCHEMA_NAME => ILevelSchema::NAME__DEFAULT,
            Balance::FIELD__TYPE => Balance::TYPE__PLAYER
        ]));
    }
}
