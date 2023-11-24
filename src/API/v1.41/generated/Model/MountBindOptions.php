<?php

namespace Mdshack\Docker\API\v1_41\Model;

class MountBindOptions extends \ArrayObject
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
     * A propagation mode with the value `[r]private`, `[r]shared`, or `[r]slave`.
     *
     * @var string
     */
    protected $propagation;

    /**
     * Disable recursive bind mount.
     *
     * @var bool
     */
    protected $nonRecursive = false;

    /**
     * A propagation mode with the value `[r]private`, `[r]shared`, or `[r]slave`.
     */
    public function getPropagation(): string
    {
        return $this->propagation;
    }

    /**
     * A propagation mode with the value `[r]private`, `[r]shared`, or `[r]slave`.
     */
    public function setPropagation(string $propagation): self
    {
        $this->initialized['propagation'] = true;
        $this->propagation = $propagation;

        return $this;
    }

    /**
     * Disable recursive bind mount.
     */
    public function getNonRecursive(): bool
    {
        return $this->nonRecursive;
    }

    /**
     * Disable recursive bind mount.
     */
    public function setNonRecursive(bool $nonRecursive): self
    {
        $this->initialized['nonRecursive'] = true;
        $this->nonRecursive = $nonRecursive;

        return $this;
    }
}
