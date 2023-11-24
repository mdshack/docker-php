<?php

namespace Mdshack\Docker\API\v1_42\Model;

class NetworksCreatePostResponse201 extends \ArrayObject
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
     * The ID of the created network.
     *
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $warning;

    /**
     * The ID of the created network.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the created network.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getWarning(): string
    {
        return $this->warning;
    }

    public function setWarning(string $warning): self
    {
        $this->initialized['warning'] = true;
        $this->warning = $warning;

        return $this;
    }
}
