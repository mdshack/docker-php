<?php

namespace Mdshack\Docker\API\v1_41\Model;

class ImageID extends \ArrayObject
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
     * @var string
     */
    protected $iD;

    public function getID(): string
    {
        return $this->iD;
    }

    public function setID(string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

        return $this;
    }
}
