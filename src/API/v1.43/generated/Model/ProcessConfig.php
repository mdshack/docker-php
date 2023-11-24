<?php

namespace Mdshack\Docker\API\v1_43\Model;

class ProcessConfig extends \ArrayObject
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
     * @var bool
     */
    protected $privileged;
    /**
     * 
     *
     * @var string
     */
    protected $user;
    /**
     * 
     *
     * @var bool
     */
    protected $tty;
    /**
     * 
     *
     * @var string
     */
    protected $entrypoint;
    /**
     * 
     *
     * @var string[]
     */
    protected $arguments;
    /**
     * 
     *
     * @return bool
     */
    public function getPrivileged() : bool
    {
        return $this->privileged;
    }
    /**
     * 
     *
     * @param bool $privileged
     *
     * @return self
     */
    public function setPrivileged(bool $privileged) : self
    {
        $this->initialized['privileged'] = true;
        $this->privileged = $privileged;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getUser() : string
    {
        return $this->user;
    }
    /**
     * 
     *
     * @param string $user
     *
     * @return self
     */
    public function setUser(string $user) : self
    {
        $this->initialized['user'] = true;
        $this->user = $user;
        return $this;
    }
    /**
     * 
     *
     * @return bool
     */
    public function getTty() : bool
    {
        return $this->tty;
    }
    /**
     * 
     *
     * @param bool $tty
     *
     * @return self
     */
    public function setTty(bool $tty) : self
    {
        $this->initialized['tty'] = true;
        $this->tty = $tty;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getEntrypoint() : string
    {
        return $this->entrypoint;
    }
    /**
     * 
     *
     * @param string $entrypoint
     *
     * @return self
     */
    public function setEntrypoint(string $entrypoint) : self
    {
        $this->initialized['entrypoint'] = true;
        $this->entrypoint = $entrypoint;
        return $this;
    }
    /**
     * 
     *
     * @return string[]
     */
    public function getArguments() : array
    {
        return $this->arguments;
    }
    /**
     * 
     *
     * @param string[] $arguments
     *
     * @return self
     */
    public function setArguments(array $arguments) : self
    {
        $this->initialized['arguments'] = true;
        $this->arguments = $arguments;
        return $this;
    }
}