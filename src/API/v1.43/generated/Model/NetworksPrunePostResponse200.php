<?php

namespace Mdshack\Docker\API\v1_43\Model;

class NetworksPrunePostResponse200 extends \ArrayObject
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
     * Networks that were deleted
     *
     * @var string[]
     */
    protected $networksDeleted;

    /**
     * Networks that were deleted
     *
     * @return string[]
     */
    public function getNetworksDeleted(): array
    {
        return $this->networksDeleted;
    }

    /**
     * Networks that were deleted
     *
     * @param  string[]  $networksDeleted
     */
    public function setNetworksDeleted(array $networksDeleted): self
    {
        $this->initialized['networksDeleted'] = true;
        $this->networksDeleted = $networksDeleted;

        return $this;
    }
}
