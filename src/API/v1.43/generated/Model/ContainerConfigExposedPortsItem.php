<?php

namespace Mdshack\Docker\API\_____\Model;

class ContainerConfigExposedPortsItem extends \ArrayObject
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