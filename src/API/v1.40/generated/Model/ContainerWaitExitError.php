<?php

namespace Mdshack\Docker\API\v1_40\Model;

class ContainerWaitExitError extends \ArrayObject
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
     * Details of an error
     *
     * @var string
     */
    protected $message;

    /**
     * Details of an error
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Details of an error
     */
    public function setMessage(string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;

        return $this;
    }
}
