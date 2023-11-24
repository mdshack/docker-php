<?php

namespace Mdshack\Docker\API\v1_42\Model;

class DeviceRequest extends \ArrayObject
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
     * @var string
     */
    protected $driver;
    /**
     * 
     *
     * @var int
     */
    protected $count;
    /**
     * 
     *
     * @var string[]
     */
    protected $deviceIDs;
    /**
     * A list of capabilities; an OR list of AND lists of capabilities.
     *
     * @var string[][]
     */
    protected $capabilities;
    /**
    * Driver-specific options, specified as a key/value pairs. These options
    are passed directly to the driver.
    
    *
    * @var array<string, string>
    */
    protected $options;
    /**
     * 
     *
     * @return string
     */
    public function getDriver() : string
    {
        return $this->driver;
    }
    /**
     * 
     *
     * @param string $driver
     *
     * @return self
     */
    public function setDriver(string $driver) : self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getCount() : int
    {
        return $this->count;
    }
    /**
     * 
     *
     * @param int $count
     *
     * @return self
     */
    public function setCount(int $count) : self
    {
        $this->initialized['count'] = true;
        $this->count = $count;
        return $this;
    }
    /**
     * 
     *
     * @return string[]
     */
    public function getDeviceIDs() : array
    {
        return $this->deviceIDs;
    }
    /**
     * 
     *
     * @param string[] $deviceIDs
     *
     * @return self
     */
    public function setDeviceIDs(array $deviceIDs) : self
    {
        $this->initialized['deviceIDs'] = true;
        $this->deviceIDs = $deviceIDs;
        return $this;
    }
    /**
     * A list of capabilities; an OR list of AND lists of capabilities.
     *
     * @return string[][]
     */
    public function getCapabilities() : array
    {
        return $this->capabilities;
    }
    /**
     * A list of capabilities; an OR list of AND lists of capabilities.
     *
     * @param string[][] $capabilities
     *
     * @return self
     */
    public function setCapabilities(array $capabilities) : self
    {
        $this->initialized['capabilities'] = true;
        $this->capabilities = $capabilities;
        return $this;
    }
    /**
    * Driver-specific options, specified as a key/value pairs. These options
    are passed directly to the driver.
    
    *
    * @return array<string, string>
    */
    public function getOptions() : iterable
    {
        return $this->options;
    }
    /**
    * Driver-specific options, specified as a key/value pairs. These options
    are passed directly to the driver.
    
    *
    * @param array<string, string> $options
    *
    * @return self
    */
    public function setOptions(iterable $options) : self
    {
        $this->initialized['options'] = true;
        $this->options = $options;
        return $this;
    }
}