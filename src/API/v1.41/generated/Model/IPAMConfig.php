<?php

namespace Mdshack\Docker\API\v1_41\Model;

class IPAMConfig extends \ArrayObject
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
    protected $subnet;

    /**
     * @var string
     */
    protected $iPRange;

    /**
     * @var string
     */
    protected $gateway;

    /**
     * @var array<string, string>
     */
    protected $auxiliaryAddresses;

    public function getSubnet(): string
    {
        return $this->subnet;
    }

    public function setSubnet(string $subnet): self
    {
        $this->initialized['subnet'] = true;
        $this->subnet = $subnet;

        return $this;
    }

    public function getIPRange(): string
    {
        return $this->iPRange;
    }

    public function setIPRange(string $iPRange): self
    {
        $this->initialized['iPRange'] = true;
        $this->iPRange = $iPRange;

        return $this;
    }

    public function getGateway(): string
    {
        return $this->gateway;
    }

    public function setGateway(string $gateway): self
    {
        $this->initialized['gateway'] = true;
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * @return array<string, string>
     */
    public function getAuxiliaryAddresses(): iterable
    {
        return $this->auxiliaryAddresses;
    }

    /**
     * @param  array<string, string>  $auxiliaryAddresses
     */
    public function setAuxiliaryAddresses(iterable $auxiliaryAddresses): self
    {
        $this->initialized['auxiliaryAddresses'] = true;
        $this->auxiliaryAddresses = $auxiliaryAddresses;

        return $this;
    }
}
