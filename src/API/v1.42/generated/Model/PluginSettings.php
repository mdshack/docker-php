<?php

namespace Mdshack\Docker\API\v1_42\Model;

class PluginSettings extends \ArrayObject
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
     * @var PluginMount[]
     */
    protected $mounts;
    /**
     * 
     *
     * @var string[]
     */
    protected $env;
    /**
     * 
     *
     * @var string[]
     */
    protected $args;
    /**
     * 
     *
     * @var PluginDevice[]
     */
    protected $devices;
    /**
     * 
     *
     * @return PluginMount[]
     */
    public function getMounts() : array
    {
        return $this->mounts;
    }
    /**
     * 
     *
     * @param PluginMount[] $mounts
     *
     * @return self
     */
    public function setMounts(array $mounts) : self
    {
        $this->initialized['mounts'] = true;
        $this->mounts = $mounts;
        return $this;
    }
    /**
     * 
     *
     * @return string[]
     */
    public function getEnv() : array
    {
        return $this->env;
    }
    /**
     * 
     *
     * @param string[] $env
     *
     * @return self
     */
    public function setEnv(array $env) : self
    {
        $this->initialized['env'] = true;
        $this->env = $env;
        return $this;
    }
    /**
     * 
     *
     * @return string[]
     */
    public function getArgs() : array
    {
        return $this->args;
    }
    /**
     * 
     *
     * @param string[] $args
     *
     * @return self
     */
    public function setArgs(array $args) : self
    {
        $this->initialized['args'] = true;
        $this->args = $args;
        return $this;
    }
    /**
     * 
     *
     * @return PluginDevice[]
     */
    public function getDevices() : array
    {
        return $this->devices;
    }
    /**
     * 
     *
     * @param PluginDevice[] $devices
     *
     * @return self
     */
    public function setDevices(array $devices) : self
    {
        $this->initialized['devices'] = true;
        $this->devices = $devices;
        return $this;
    }
}