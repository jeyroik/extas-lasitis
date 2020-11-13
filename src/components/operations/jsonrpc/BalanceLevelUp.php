<?php
namespace extas\components\operations\jsonrpc;

use extas\components\exceptions\MissedOrUnknown;
use extas\interfaces\IHasName;
use extas\interfaces\repositories\IRepository;

/**
 * Class BalanceLevelUp
 *
 * @method IRepository balances()
 *
 * @package extas\components\operations\jsonrpc
 * @author jeyroik <jeyroik@gmail.com>
 */
class BalanceLevelUp extends LevelUp
{
    /**
     * @return array
     * @throws MissedOrUnknown
     */
    public function run(): array
    {
        return $this->up(
            $this->getJsonRpcRequest()->getParams()[IHasName::FIELD__NAME] ?? '',
            $this->balances(),
            false
        );
    }
}
