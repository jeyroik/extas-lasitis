<?php
namespace extas\interfaces\levels;

use extas\interfaces\IHasLevel;

/**
 * Interface IHasLevelSchema
 *
 * @package extas\interfaces\levels
 * @author jeyroik <jeyroik@gmail.com>
 */
interface IHasLevelSchema extends IHasLevel
{
    public const FIELD__LEVEL_SCHEMA_NAME = 'level_schema_name';

    /**
     * @return string
     */
    public function getLevelSchemaName(): string;

    /**
     * @return ILevelSchema|null
     */
    public function getLevelSchema(): ?ILevelSchema;

    /**
     * @param string $name
     * @return $this
     */
    public function setLevelSchemaName(string $name);
}
