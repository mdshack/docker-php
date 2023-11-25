<?php

namespace Mdshack\Docker\API\v1_40\Model;

class MountVolumeOptions extends \ArrayObject
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
     * Populate volume with data from the target.
     *
     * @var bool
     */
    protected $noCopy = false;

    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>
     */
    protected $labels;

    /**
     * Map of driver specific options
     *
     * @var MountVolumeOptionsDriverConfig
     */
    protected $driverConfig;

    /**
     * Populate volume with data from the target.
     */
    public function getNoCopy(): bool
    {
        return $this->noCopy;
    }

    /**
     * Populate volume with data from the target.
     */
    public function setNoCopy(bool $noCopy): self
    {
        $this->initialized['noCopy'] = true;
        $this->noCopy = $noCopy;

        return $this;
    }

    /**
     * User-defined key/value metadata.
     *
     * @return array<string, string>
     */
    public function getLabels(): iterable
    {
        return $this->labels;
    }

    /**
     * User-defined key/value metadata.
     *
     * @param  array<string, string>  $labels
     */
    public function setLabels(iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    /**
     * Map of driver specific options
     */
    public function getDriverConfig(): MountVolumeOptionsDriverConfig
    {
        return $this->driverConfig;
    }

    /**
     * Map of driver specific options
     */
    public function setDriverConfig(MountVolumeOptionsDriverConfig $driverConfig): self
    {
        $this->initialized['driverConfig'] = true;
        $this->driverConfig = $driverConfig;

        return $this;
    }
}
