<?php

namespace Mdshack\Docker\API\v1_42\Model;

class TaskSpecPlacementPreferencesItemSpread extends \ArrayObject
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
     * label descriptor, such as `engine.labels.az`.
     *
     * @var string
     */
    protected $spreadDescriptor;

    /**
     * label descriptor, such as `engine.labels.az`.
     */
    public function getSpreadDescriptor(): string
    {
        return $this->spreadDescriptor;
    }

    /**
     * label descriptor, such as `engine.labels.az`.
     */
    public function setSpreadDescriptor(string $spreadDescriptor): self
    {
        $this->initialized['spreadDescriptor'] = true;
        $this->spreadDescriptor = $spreadDescriptor;

        return $this;
    }
}
