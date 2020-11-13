<?php
namespace extas\components\operations\jsonrpc;

use extas\components\api\jsonrpc\operations\OperationRunner;
use extas\components\exceptions\MissedOrUnknown;
use extas\components\transactions\Transaction;
use extas\interfaces\balances\IBalance;
use extas\interfaces\IHasName;
use extas\interfaces\repositories\IRepository;
use Ramsey\Uuid\Uuid;

/**
 * Class LevelUp
 *
 * @method IRepository transactions()
 *
 * @package extas\components\operations\jsonrpc
 * @author jeyroik <jeyroik@gmail.com>
 */
class LevelUp extends OperationRunner
{
    /**
     * @param string $subjectName
     * @param IRepository $repo
     * @param bool $updateValue
     * @return array
     * @throws MissedOrUnknown
     */
    protected function up($subjectName, $repo, $updateValue = true): array
    {
        $subject = $repo->one([IHasName::FIELD__NAME => $subjectName]);

        if (!$subject) {
            throw new MissedOrUnknown($repo->getName());
        }

        $this->transactions()->create(new Transaction([
            Transaction::FIELD__FROM_BALANCE => $subject->getPlayerName(),
            Transaction::FIELD__TO_BALANCE => IBalance::CHEST,
            Transaction::FIELD__CREATED_AT => time(),
            Transaction::FIELD__ID => Uuid::uuid4(),
            Transaction::FIELD__VALUE => $subject->getLevelSchema()->getPrice($subject->getNextLevel())
        ]));

        $subject->incLevel();
        $updateValue && $subject->setValue(
            $subject->getValue()
            + $subject->getValue() * $subject->getLevelSchema()->getMultiplicator($subject->getLevel())
        );
        $repo->update($subject);

        return [
            'items' => [
                $subject->__toArray()
            ],
            'total' => 1
        ];
    }
}
