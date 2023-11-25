<?php

namespace Mdshack\Docker\API\v1_40\Model;

class TaskStatus extends \ArrayObject
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
    protected $timestamp;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $err;

    /**
     * @var TaskStatusContainerStatus
     */
    protected $containerStatus;

    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    public function setTimestamp(string $timestamp): self
    {
        $this->initialized['timestamp'] = true;
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

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

    public function getErr(): string
    {
        return $this->err;
    }

    public function setErr(string $err): self
    {
        $this->initialized['err'] = true;
        $this->err = $err;

        return $this;
    }

    public function getContainerStatus(): TaskStatusContainerStatus
    {
        return $this->containerStatus;
    }

    public function setContainerStatus(TaskStatusContainerStatus $containerStatus): self
    {
        $this->initialized['containerStatus'] = true;
        $this->containerStatus = $containerStatus;

        return $this;
    }
}
