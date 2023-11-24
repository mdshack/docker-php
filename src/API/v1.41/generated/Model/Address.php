<?php

namespace Mdshack\Docker\API\v1_41\Model;

class Address extends \ArrayObject
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
     * IP address.
     *
     * @var string
     */
    protected $addr;

    /**
     * Mask length of the IP address.
     *
     * @var int
     */
    protected $prefixLen;

    /**
     * IP address.
     */
    public function getAddr(): string
    {
        return $this->addr;
    }

    /**
     * IP address.
     */
    public function setAddr(string $addr): self
    {
        $this->initialized['addr'] = true;
        $this->addr = $addr;

        return $this;
    }

    /**
     * Mask length of the IP address.
     */
    public function getPrefixLen(): int
    {
        return $this->prefixLen;
    }

    /**
     * Mask length of the IP address.
     */
    public function setPrefixLen(int $prefixLen): self
    {
        $this->initialized['prefixLen'] = true;
        $this->prefixLen = $prefixLen;

        return $this;
    }
}
