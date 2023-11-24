<?php

namespace Mdshack\Docker\API\v1_41\Model;

class ContainersPrunePostResponse200 extends \ArrayObject
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
     * Container IDs that were deleted
     *
     * @var string[]
     */
    protected $containersDeleted;

    /**
     * Disk space reclaimed in bytes
     *
     * @var int
     */
    protected $spaceReclaimed;

    /**
     * Container IDs that were deleted
     *
     * @return string[]
     */
    public function getContainersDeleted(): array
    {
        return $this->containersDeleted;
    }

    /**
     * Container IDs that were deleted
     *
     * @param  string[]  $containersDeleted
     */
    public function setContainersDeleted(array $containersDeleted): self
    {
        $this->initialized['containersDeleted'] = true;
        $this->containersDeleted = $containersDeleted;

        return $this;
    }

    /**
     * Disk space reclaimed in bytes
     */
    public function getSpaceReclaimed(): int
    {
        return $this->spaceReclaimed;
    }

    /**
     * Disk space reclaimed in bytes
     */
    public function setSpaceReclaimed(int $spaceReclaimed): self
    {
        $this->initialized['spaceReclaimed'] = true;
        $this->spaceReclaimed = $spaceReclaimed;

        return $this;
    }
}
