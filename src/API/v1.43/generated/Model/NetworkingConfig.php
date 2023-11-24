<?php

namespace Mdshack\Docker\API\v1_43\Model;

class NetworkingConfig extends \ArrayObject
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
     * A mapping of network name to endpoint configuration for that network.
     *
     * @var array<string, EndpointSettings>
     */
    protected $endpointsConfig;

    /**
     * A mapping of network name to endpoint configuration for that network.
     *
     * @return array<string, EndpointSettings>
     */
    public function getEndpointsConfig(): iterable
    {
        return $this->endpointsConfig;
    }

    /**
     * A mapping of network name to endpoint configuration for that network.
     *
     * @param  array<string, EndpointSettings>  $endpointsConfig
     */
    public function setEndpointsConfig(iterable $endpointsConfig): self
    {
        $this->initialized['endpointsConfig'] = true;
        $this->endpointsConfig = $endpointsConfig;

        return $this;
    }
}
