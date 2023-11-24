<?php

namespace Mdshack\Docker\API\v1_41\Model;

class ServiceSpecModeGlobalJob extends \ArrayObject
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
