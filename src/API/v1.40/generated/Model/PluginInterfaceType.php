<?php

namespace Mdshack\Docker\API\v1_40\Model;

class PluginInterfaceType extends \ArrayObject
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
    protected $prefix;

    /**
     * @var string
     */
    protected $capability;

    /**
     * @var string
     */
    protected $version;

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function setPrefix(string $prefix): self
    {
        $this->initialized['prefix'] = true;
        $this->prefix = $prefix;

        return $this;
    }

    public function getCapability(): string
    {
        return $this->capability;
    }

    public function setCapability(string $capability): self
    {
        $this->initialized['capability'] = true;
        $this->capability = $capability;

        return $this;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;

        return $this;
    }
}
