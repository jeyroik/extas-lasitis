<?php
namespace extas\components\levels;

use extas\components\THasLevel;
use extas\interfaces\levels\IHasLevelSchema;
use extas\interfaces\levels\ILevelSchema;
use extas\interfaces\repositories\IRepository;

/**
 * Trait THasLevelSchema
 *
 * @property array $config
 * @method IRepository levelSchemas()
 *
 * @package extas\components\levels
 * @author jeyroik <jeyroik@gmail.com>
 */
trait THasLevelSchema
{
    use THasLevel;

    /**
     * @return string
     */
    public function getLevelSchemaName(): string
    {
        return $this->config[IHasLevelSchema::FIELD__LEVEL_SCHEMA_NAME] ?? '';
    }

    /**
     * @return ILevelSchema|null
     */
    public function getLevelSchema(): ?ILevelSchema
    {
        return $this->levelSchemas()->one([ILevelSchema::FIELD__NAME => $this->getLevelSchemaName()]);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setLevelSchemaName(string $name)
    {
        $this->config[IHasLevelSchema::FIELD__LEVEL_SCHEMA_NAME] = $name;

        return $this;
    }
}
