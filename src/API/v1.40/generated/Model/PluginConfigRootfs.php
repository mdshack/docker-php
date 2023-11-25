<?php

namespace Mdshack\Docker\API\v1_40\Model;

class PluginConfigRootfs extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string[]
     */
    protected $diffIds;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getDiffIds(): array
    {
        return $this->diffIds;
    }

    /**
     * @param  string[]  $diffIds
     */
    public function setDiffIds(array $diffIds): self
    {
        $this->initialized['diffIds'] = true;
        $this->diffIds = $diffIds;

        return $this;
    }
}
