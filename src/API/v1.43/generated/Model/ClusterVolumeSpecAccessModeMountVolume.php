<?php

namespace Mdshack\Docker\API\v1_43\Model;

class ClusterVolumeSpecAccessModeMountVolume extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
}
