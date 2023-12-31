<?php

namespace Mdshack\Docker\API\v1_43\Model;

class BuildPrunePostResponse200 extends \ArrayObject
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
     * @var string[]
     */
    protected $cachesDeleted;

    /**
     * Disk space reclaimed in bytes
     *
     * @var int
     */
    protected $spaceReclaimed;

    /**
     * @return string[]
     */
    public function getCachesDeleted(): array
    {
        return $this->cachesDeleted;
    }

    /**
     * @param  string[]  $cachesDeleted
     */
    public function setCachesDeleted(array $cachesDeleted): self
    {
        $this->initialized['cachesDeleted'] = true;
        $this->cachesDeleted = $cachesDeleted;

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
