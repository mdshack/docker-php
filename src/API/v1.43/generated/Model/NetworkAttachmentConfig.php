<?php

namespace Mdshack\Docker\API\v1_43\Model;

class NetworkAttachmentConfig extends \ArrayObject
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
     * The target network for attachment. Must be a network name or ID.
     *
     * @var string
     */
    protected $target;

    /**
     * Discoverable alternate names for the service on this network.
     *
     * @var string[]
     */
    protected $aliases;

    /**
     * Driver attachment options for the network target.
     *
     * @var array<string, string>
     */
    protected $driverOpts;

    /**
     * The target network for attachment. Must be a network name or ID.
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * The target network for attachment. Must be a network name or ID.
     */
    public function setTarget(string $target): self
    {
        $this->initialized['target'] = true;
        $this->target = $target;

        return $this;
    }

    /**
     * Discoverable alternate names for the service on this network.
     *
     * @return string[]
     */
    public function getAliases(): array
    {
        return $this->aliases;
    }

    /**
     * Discoverable alternate names for the service on this network.
     *
     * @param  string[]  $aliases
     */
    public function setAliases(array $aliases): self
    {
        $this->initialized['aliases'] = true;
        $this->aliases = $aliases;

        return $this;
    }

    /**
     * Driver attachment options for the network target.
     *
     * @return array<string, string>
     */
    public function getDriverOpts(): iterable
    {
        return $this->driverOpts;
    }

    /**
     * Driver attachment options for the network target.
     *
     * @param  array<string, string>  $driverOpts
     */
    public function setDriverOpts(iterable $driverOpts): self
    {
        $this->initialized['driverOpts'] = true;
        $this->driverOpts = $driverOpts;

        return $this;
    }
}
