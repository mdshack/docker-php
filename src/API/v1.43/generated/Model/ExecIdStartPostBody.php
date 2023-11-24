<?php

namespace Mdshack\Docker\API\v1_43\Model;

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
     * Initial console size, as an `[height, width]` array.
     *
     * @var int[]|null
     */
    protected $consoleSize;

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

    /**
     * Initial console size, as an `[height, width]` array.
     *
     * @return int[]|null
     */
    public function getConsoleSize(): ?array
    {
        return $this->consoleSize;
    }

    /**
     * Initial console size, as an `[height, width]` array.
     *
     * @param  int[]|null  $consoleSize
     */
    public function setConsoleSize(?array $consoleSize): self
    {
        $this->initialized['consoleSize'] = true;
        $this->consoleSize = $consoleSize;

        return $this;
    }
}
