<?php
namespace tests\lasitis\balances;

use Dotenv\Dotenv;
use extas\components\balances\Balance;
use PHPUnit\Framework\TestCase;

/**
 * Class BalanceTest
 *
 * @package tests\lasitis\balances
 * @author jeyroik <jeyroik@gmail.com>
 */
class BalanceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
    }

    public function testInc()
    {
        $balance = new Balance();
        $this->assertEquals(0, $balance->getValue());
        $this->assertEquals(1, $balance->inc(1));
    }

    public function testDec()
    {
        $balance = new Balance();
        $this->assertEquals(0, $balance->getValue());
        $this->assertEquals(-1, $balance->dec(1));
    }
}
