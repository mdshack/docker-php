<?php

namespace Mdshack\Docker\API\v1_42\Model;

class ServiceSpecModeGlobalJob extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
}