<?php

namespace Mdshack\Docker\API\v1_42\Model;

class ServiceSpecMode extends \ArrayObject
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
     * @var ServiceSpecModeReplicated
     */
    protected $replicated;

    /**
     * @var ServiceSpecModeGlobal
     */
    protected $global;

    /**
     * The mode used for services with a finite number of tasks that run
    to a completed state.

     *
     * @var ServiceSpecModeReplicatedJob
     */
    protected $replicatedJob;

    /**
     * The mode used for services which run a task to the completed state
    on each valid node.

     *
     * @var ServiceSpecModeGlobalJob
     */
    protected $globalJob;

    public function getReplicated(): ServiceSpecModeReplicated
    {
        return $this->replicated;
    }

    public function setReplicated(ServiceSpecModeReplicated $replicated): self
    {
        $this->initialized['replicated'] = true;
        $this->replicated = $replicated;

        return $this;
    }

    public function getGlobal(): ServiceSpecModeGlobal
    {
        return $this->global;
    }

    public function setGlobal(ServiceSpecModeGlobal $global): self
    {
        $this->initialized['global'] = true;
        $this->global = $global;

        return $this;
    }

    /**
     * The mode used for services with a finite number of tasks that run
    to a completed state.
     */
    public function getReplicatedJob(): ServiceSpecModeReplicatedJob
    {
        return $this->replicatedJob;
    }

    /**
     * The mode used for services with a finite number of tasks that run
    to a completed state.
     */
    public function setReplicatedJob(ServiceSpecModeReplicatedJob $replicatedJob): self
    {
        $this->initialized['replicatedJob'] = true;
        $this->replicatedJob = $replicatedJob;

        return $this;
    }

    /**
     * The mode used for services which run a task to the completed state
    on each valid node.
     */
    public function getGlobalJob(): ServiceSpecModeGlobalJob
    {
        return $this->globalJob;
    }

    /**
     * The mode used for services which run a task to the completed state
    on each valid node.
     */
    public function setGlobalJob(ServiceSpecModeGlobalJob $globalJob): self
    {
        $this->initialized['globalJob'] = true;
        $this->globalJob = $globalJob;

        return $this;
    }
}
