<?php

namespace Mdshack\Docker\API\v1_41\Model;

class ExecIdStartPostBody extends \ArrayObject
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
     * Detach from the command.
     *
     * @var bool
     */
    protected $detach;

    /**
     * Allocate a pseudo-TTY.
     *
     * @var bool
     */
    protected $tty;

    /**
     * Detach from the command.
     */
    public function getDetach(): bool
    {
        return $this->detach;
    }

    /**
     * Detach from the command.
     */
    public function setDetach(bool $detach): self
    {
        $this->initialized['detach'] = true;
        $this->detach = $detach;

        return $this;
    }

    /**
     * Allocate a pseudo-TTY.
     */
    public function getTty(): bool
    {
        return $this->tty;
    }

    /**
     * Allocate a pseudo-TTY.
     */
    public function setTty(bool $tty): self
    {
        $this->initialized['tty'] = true;
        $this->tty = $tty;

        return $this;
    }
}
