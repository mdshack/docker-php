<?php

namespace Mdshack\Docker\API\v1_40\Model;

class ServiceSpecMode extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * 
     *
     * @var ServiceSpecModeReplicated
     */
    protected $replicated;
    /**
     * 
     *
     * @var ServiceSpecModeGlobal
     */
    protected $global;
    /**
     * 
     *
     * @return ServiceSpecModeReplicated
     */
    public function getReplicated() : ServiceSpecModeReplicated
    {
        return $this->replicated;
    }
    /**
     * 
     *
     * @param ServiceSpecModeReplicated $replicated
     *
     * @return self
     */
    public function setReplicated(ServiceSpecModeReplicated $replicated) : self
    {
        $this->initialized['replicated'] = true;
        $this->replicated = $replicated;
        return $this;
    }
    /**
     * 
     *
     * @return ServiceSpecModeGlobal
     */
    public function getGlobal() : ServiceSpecModeGlobal
    {
        return $this->global;
    }
    /**
     * 
     *
     * @param ServiceSpecModeGlobal $global
     *
     * @return self
     */
    public function setGlobal(ServiceSpecModeGlobal $global) : self
    {
        $this->initialized['global'] = true;
        $this->global = $global;
        return $this;
    }
}