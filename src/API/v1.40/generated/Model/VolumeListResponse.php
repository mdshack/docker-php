<?php

namespace Mdshack\Docker\API\v1_40\Model;

class VolumeListResponse extends \ArrayObject
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
     * List of volumes
     *
     * @var Volume[]
     */
    protected $volumes;

    /**
     * Warnings that occurred when fetching the list of volumes.
     *
     * @var string[]
     */
    protected $warnings;

    /**
     * List of volumes
     *
     * @return Volume[]
     */
    public function getVolumes(): array
    {
        return $this->volumes;
    }

    /**
     * List of volumes
     *
     * @param  Volume[]  $volumes
     */
    public function setVolumes(array $volumes): self
    {
        $this->initialized['volumes'] = true;
        $this->volumes = $volumes;

        return $this;
    }

    /**
     * Warnings that occurred when fetching the list of volumes.
     *
     * @return string[]
     */
    public function getWarnings(): array
    {
        return $this->warnings;
    }

    /**
     * Warnings that occurred when fetching the list of volumes.
     *
     * @param  string[]  $warnings
     */
    public function setWarnings(array $warnings): self
    {
        $this->initialized['warnings'] = true;
        $this->warnings = $warnings;

        return $this;
    }
}
