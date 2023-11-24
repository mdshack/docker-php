<?php

namespace Mdshack\Docker\API\v1_43\Model;

class ContainerConfigVolumesItem extends \ArrayObject
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