<?php

namespace Mdshack\Docker\API\v1_41\Model;

class ServiceUpdateStatus extends \ArrayObject
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
    protected $state;

    /**
     * @var string
     */
    protected $startedAt;

    /**
     * @var string
     */
    protected $completedAt;

    /**
     * @var string
     */
    protected $message;

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

    public function getStartedAt(): string
    {
        return $this->startedAt;
    }

    public function setStartedAt(string $startedAt): self
    {
        $this->initialized['startedAt'] = true;
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getCompletedAt(): string
    {
        return $this->completedAt;
    }

    public function setCompletedAt(string $completedAt): self
    {
        $this->initialized['completedAt'] = true;
        $this->completedAt = $completedAt;

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
}
