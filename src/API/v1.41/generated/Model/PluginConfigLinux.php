<?php

namespace Mdshack\Docker\API\v1_41\Model;

class PluginConfigLinux extends \ArrayObject
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
     * @var string[]
     */
    protected $capabilities;

    /**
     * @var bool
     */
    protected $allowAllDevices;

    /**
     * @var PluginDevice[]
     */
    protected $devices;

    /**
     * @return string[]
     */
    public function getCapabilities(): array
    {
        return $this->capabilities;
    }

    /**
     * @param  string[]  $capabilities
     */
    public function setCapabilities(array $capabilities): self
    {
        $this->initialized['capabilities'] = true;
        $this->capabilities = $capabilities;

        return $this;
    }

    public function getAllowAllDevices(): bool
    {
        return $this->allowAllDevices;
    }

    public function setAllowAllDevices(bool $allowAllDevices): self
    {
        $this->initialized['allowAllDevices'] = true;
        $this->allowAllDevices = $allowAllDevices;

        return $this;
    }

    /**
     * @return PluginDevice[]
     */
    public function getDevices(): array
    {
        return $this->devices;
    }

    /**
     * @param  PluginDevice[]  $devices
     */
    public function setDevices(array $devices): self
    {
        $this->initialized['devices'] = true;
        $this->devices = $devices;

        return $this;
    }
}
