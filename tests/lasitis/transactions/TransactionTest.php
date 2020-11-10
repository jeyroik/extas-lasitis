<?php
namespace tests\lasitis\transactions;

use Dotenv\Dotenv;
use extas\components\players\Player;
use extas\components\repositories\TSnuffRepositoryDynamic;
use extas\components\THasMagicClass;
use extas\components\transactions\Transaction;
use PHPUnit\Framework\TestCase;

/**
 * Class TransactionTest
 *
 * @package tests\lasitis\transactions
 * @author jeyroik <jeyroik@gmail.com>
 */
class TransactionTest extends TestCase
{
    use TSnuffRepositoryDynamic;
    use THasMagicClass;

    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
        $this->createSnuffDynamicRepositories([
            ['players', 'name', Player::class]
        ]);
    }

    protected function tearDown(): void
    {
        $this->deleteSnuffDynamicRepositories();
    }

    public function testBasicMethods()
    {
        $this->getMagicClass('players')->create(new Player([
            Player::FIELD__NAME => 'test_from',
            Player::FIELD__TITLE => 'From'
        ]));

        $this->getMagicClass('players')->create(new Player([
            Player::FIELD__NAME => 'test_to',
            Player::FIELD__TITLE => 'To'
        ]));

        $t = new Transaction();
        $t->setFromPlayerName('test_from')
            ->setToPlayerName('test_to')
            ->setComment('test');

        $this->assertEquals('test_from', $t->getFromPlayerName());
        $this->assertEquals('test_to', $t->getToPlayerName());
        $this->assertEquals('test', $t->getComment());
        $this->assertEquals('From', $t->getFromPlayer()->getTitle());
        $this->assertEquals('To', $t->getToPlayer()->getTitle());
    }
}
