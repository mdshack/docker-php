<?php

namespace Mdshack\Docker\API\v1_43\Model;

class ImagesPrunePostResponse200 extends \ArrayObject
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
     * Images that were deleted
     *
     * @var ImageDeleteResponseItem[]
     */
    protected $imagesDeleted;

    /**
     * Disk space reclaimed in bytes
     *
     * @var int
     */
    protected $spaceReclaimed;

    /**
     * Images that were deleted
     *
     * @return ImageDeleteResponseItem[]
     */
    public function getImagesDeleted(): array
    {
        return $this->imagesDeleted;
    }

    /**
     * Images that were deleted
     *
     * @param  ImageDeleteResponseItem[]  $imagesDeleted
     */
    public function setImagesDeleted(array $imagesDeleted): self
    {
        $this->initialized['imagesDeleted'] = true;
        $this->imagesDeleted = $imagesDeleted;

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
