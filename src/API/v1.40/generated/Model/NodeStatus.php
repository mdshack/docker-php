<?php

namespace Mdshack\Docker\API\v1_40\Model;

class NodeStatus extends \ArrayObject
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
     * NodeState represents the state of a node.
     *
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $message;

    /**
     * IP address of the node.
     *
     * @var string
     */
    protected $addr;

    /**
     * NodeState represents the state of a node.
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * NodeState represents the state of a node.
     */
    public function setState(string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;

        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;

        return $this;
    }

    /**
     * IP address of the node.
     */
    public function getAddr(): string
    {
        return $this->addr;
    }

    /**
     * IP address of the node.
     */
    public function setAddr(string $addr): self
    {
        $this->initialized['addr'] = true;
        $this->addr = $addr;

        return $this;
    }
}
