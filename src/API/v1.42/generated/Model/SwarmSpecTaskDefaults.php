<?php

namespace Mdshack\Docker\API\v1_42\Model;

class SwarmSpecTaskDefaults extends \ArrayObject
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
     * The log driver to use for tasks created in the orchestrator if
    unspecified by a service.

    Updating this value only affects new tasks. Existing tasks continue
    to use their previously configured log driver until recreated.

     *
     * @var SwarmSpecTaskDefaultsLogDriver
     */
    protected $logDriver;

    /**
     * The log driver to use for tasks created in the orchestrator if
    unspecified by a service.

    Updating this value only affects new tasks. Existing tasks continue
    to use their previously configured log driver until recreated.
     */
    public function getLogDriver(): SwarmSpecTaskDefaultsLogDriver
    {
        return $this->logDriver;
    }

    /**
     * The log driver to use for tasks created in the orchestrator if
    unspecified by a service.

    Updating this value only affects new tasks. Existing tasks continue
    to use their previously configured log driver until recreated.
     */
    public function setLogDriver(SwarmSpecTaskDefaultsLogDriver $logDriver): self
    {
        $this->initialized['logDriver'] = true;
        $this->logDriver = $logDriver;

        return $this;
    }
}