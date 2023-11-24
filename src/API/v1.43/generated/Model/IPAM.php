<?php

namespace Mdshack\Docker\API\v1_43\Model;

class IPAM extends \ArrayObject
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
     * Name of the IPAM driver to use.
     *
     * @var string
     */
    protected $driver = 'default';

    /**
     * List of IPAM configuration options, specified as a map:

    ```
    {"Subnet": <CIDR>, "IPRange": <CIDR>, "Gateway": <IP address>, "AuxAddress": <device_name:IP address>}
    ```

     *
     * @var IPAMConfig[]
     */
    protected $config;

    /**
     * Driver-specific options, specified as a map.
     *
     * @var array<string, string>
     */
    protected $options;

    /**
     * Name of the IPAM driver to use.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * Name of the IPAM driver to use.
     */
    public function setDriver(string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    /**
     * List of IPAM configuration options, specified as a map:

    ```
    {"Subnet": <CIDR>, "IPRange": <CIDR>, "Gateway": <IP address>, "AuxAddress": <device_name:IP address>}
    ```

     *
     * @return IPAMConfig[]
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * List of IPAM configuration options, specified as a map:

    ```
    {"Subnet": <CIDR>, "IPRange": <CIDR>, "Gateway": <IP address>, "AuxAddress": <device_name:IP address>}
    ```

     *
     * @param  IPAMConfig[]  $config
     */
    public function setConfig(array $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }

    /**
     * Driver-specific options, specified as a map.
     *
     * @return array<string, string>
     */
    public function getOptions(): iterable
    {
        return $this->options;
    }

    /**
     * Driver-specific options, specified as a map.
     *
     * @param  array<string, string>  $options
     */
    public function setOptions(iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }
}
