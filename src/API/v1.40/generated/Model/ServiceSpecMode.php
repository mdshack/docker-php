<?php

namespace Mdshack\Docker\API\v1_40\Model;

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
}
