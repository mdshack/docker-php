<?php

namespace Mdshack\Docker\API\v1_40\Model;

class ServicesCreatePostResponse201 extends \ArrayObject
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
     * The ID of the created service.
     *
     * @var string
     */
    protected $iD;

    /**
     * Optional warning message
     *
     * @var string
     */
    protected $warning;

    /**
     * The ID of the created service.
     */
    public function getID(): string
    {
        return $this->iD;
    }

    /**
     * The ID of the created service.
     */
    public function setID(string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

        return $this;
    }

    /**
     * Optional warning message
     */
    public function getWarning(): string
    {
        return $this->warning;
    }

    /**
     * Optional warning message
     */
    public function setWarning(string $warning): self
    {
        $this->initialized['warning'] = true;
        $this->warning = $warning;

        return $this;
    }
}
