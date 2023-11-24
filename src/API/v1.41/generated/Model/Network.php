<?php

namespace Mdshack\Docker\API\v1_41\Model;

class Network extends \ArrayObject
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
    protected $name;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $created;

    /**
     * @var string
     */
    protected $scope;

    /**
     * @var string
     */
    protected $driver;

    /**
     * @var bool
     */
    protected $enableIPv6;

    /**
     * @var IPAM
     */
    protected $iPAM;

    /**
     * @var bool
     */
    protected $internal;

    /**
     * @var bool
     */
    protected $attachable;

    /**
     * @var bool
     */
    protected $ingress;

    /**
     * @var array<string, NetworkContainer>
     */
    protected $containers;

    /**
     * @var array<string, string>
     */
    protected $options;

    /**
     * @var array<string, string>
     */
    protected $labels;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function setCreated(string $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function setScope(string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    public function getDriver(): string
    {
        return $this->driver;
    }

    public function setDriver(string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    public function getEnableIPv6(): bool
    {
        return $this->enableIPv6;
    }

    public function setEnableIPv6(bool $enableIPv6): self
    {
        $this->initialized['enableIPv6'] = true;
        $this->enableIPv6 = $enableIPv6;

        return $this;
    }

    public function getIPAM(): IPAM
    {
        return $this->iPAM;
    }

    public function setIPAM(IPAM $iPAM): self
    {
        $this->initialized['iPAM'] = true;
        $this->iPAM = $iPAM;

        return $this;
    }

    public function getInternal(): bool
    {
        return $this->internal;
    }

    public function setInternal(bool $internal): self
    {
        $this->initialized['internal'] = true;
        $this->internal = $internal;

        return $this;
    }

    public function getAttachable(): bool
    {
        return $this->attachable;
    }

    public function setAttachable(bool $attachable): self
    {
        $this->initialized['attachable'] = true;
        $this->attachable = $attachable;

        return $this;
    }

    public function getIngress(): bool
    {
        return $this->ingress;
    }

    public function setIngress(bool $ingress): self
    {
        $this->initialized['ingress'] = true;
        $this->ingress = $ingress;

        return $this;
    }

    /**
     * @return array<string, NetworkContainer>
     */
    public function getContainers(): iterable
    {
        return $this->containers;
    }

    /**
     * @param  array<string, NetworkContainer>  $containers
     */
    public function setContainers(iterable $containers): self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;

        return $this;
    }

    /**
     * @return array<string, string>
     */
    public function getOptions(): iterable
    {
        return $this->options;
    }

    /**
     * @param  array<string, string>  $options
     */
    public function setOptions(iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }

    /**
     * @return array<string, string>
     */
    public function getLabels(): iterable
    {
        return $this->labels;
    }

    /**
     * @param  array<string, string>  $labels
     */
    public function setLabels(iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }
}
