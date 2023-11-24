<?php

namespace Mdshack\Docker\API\v1_43\Model;

class HostConfigLogConfig extends \ArrayObject
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
    protected $type;

    /**
     * @var array<string, string>
     */
    protected $config;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * @return array<string, string>
     */
    public function getConfig(): iterable
    {
        return $this->config;
    }

    /**
     * @param  array<string, string>  $config
     */
    public function setConfig(iterable $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }
}
