<?php
namespace extas\components\plugins\players;

use extas\components\players\Player;
use extas\components\plugins\Plugin;
use extas\interfaces\balances\IBalance;
use extas\interfaces\IItem;
use extas\interfaces\quests\IQuest;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\stages\IStageDeleteAfter;
use extas\interfaces\transactions\ITransaction;

/**
 * Class DeleteProperty
 *
 * @method IRepository balances()
 * @method IRepository transactions()
 * @method IRepository quests()
 *
 * @package extas\components\plugins\players
 * @author jeyroik <jeyroik@gmail.com>
 */
class DeleteProperty extends Plugin implements IStageDeleteAfter
{
    /**
     * @param bool $result
     * @param array $where
     * @param IItem|null $item
     * @param IRepository $itemRepository
     */
    public function __invoke(bool &$result, array $where, ?IItem $item, IRepository $itemRepository): void
    {
        $player = new Player($where);
        $this->balances()->delete([IBalance::FIELD__PLAYER_NAME => $player->getName()]);
        $this->transactions()->delete([ITransaction::FIELD__TO_PLAYER => $player->getName()]);
        $this->quests()->delete([IQuest::FIELD__PLAYER_NAME => $player->getName()]);
    }
}
