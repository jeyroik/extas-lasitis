<?php
namespace tests\lasitis\quests;

use Dotenv\Dotenv;
use extas\components\quests\Quest;
use PHPUnit\Framework\TestCase;

/**
 * Class QuestTest
 *
 * @package tests\lasitis\quests
 * @author jeyroik <jeyroik@gmail.com>
 */
class QuestTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
    }

    public function testBasic()
    {
        $quest = new Quest();

        $this->assertEquals(Quest::SUBJECT, $quest->__subject());
        $this->assertEquals(1, $quest->incLevel());
    }
}
