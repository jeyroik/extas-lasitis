<?php
namespace tests\lasitis\levels;

use Dotenv\Dotenv;
use extas\components\levels\LevelSchema;
use extas\interfaces\samples\parameters\ISampleParameter;
use PHPUnit\Framework\TestCase;

/**
 * Class LevelSchemaTest
 *
 * @package tests\lasitis\levels
 * @author jeyroik <jeyroik@gmail.com>
 */
class LevelSchemaTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
    }

    public function testGetSetMultiplicator()
    {
        $schema = new LevelSchema([
            LevelSchema::FIELD__PARAMETERS => [
                LevelSchema::PARAM__MULTIPLICATOR => [
                    ISampleParameter::FIELD__NAME => LevelSchema::PARAM__MULTIPLICATOR,
                    ISampleParameter::FIELD__VALUE => []
                ]
            ]
        ]);
        $this->assertEquals(0, $schema->getMultiplicator(1));

        $schema->setMultiplicator(1, 10);
        $this->assertEquals(10, $schema->getMultiplicator(1));
    }
}
