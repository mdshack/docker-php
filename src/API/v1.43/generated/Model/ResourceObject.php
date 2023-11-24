<?php

namespace Mdshack\Docker\API\v1_43\Model;

class ResourceObject extends \ArrayObject
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
     * @var int
     */
    protected $nanoCPUs;
    /**
     * 
     *
     * @var int
     */
    protected $memoryBytes;
    /**
    * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
    String resources (e.g, `GPU=UUID1`).
    
    *
    * @var GenericResourcesItem[]
    */
    protected $genericResources;
    /**
     * 
     *
     * @return int
     */
    public function getNanoCPUs() : int
    {
        return $this->nanoCPUs;
    }
    /**
     * 
     *
     * @param int $nanoCPUs
     *
     * @return self
     */
    public function setNanoCPUs(int $nanoCPUs) : self
    {
        $this->initialized['nanoCPUs'] = true;
        $this->nanoCPUs = $nanoCPUs;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getMemoryBytes() : int
    {
        return $this->memoryBytes;
    }
    /**
     * 
     *
     * @param int $memoryBytes
     *
     * @return self
     */
    public function setMemoryBytes(int $memoryBytes) : self
    {
        $this->initialized['memoryBytes'] = true;
        $this->memoryBytes = $memoryBytes;
        return $this;
    }
    /**
    * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
    String resources (e.g, `GPU=UUID1`).
    
    *
    * @return GenericResourcesItem[]
    */
    public function getGenericResources() : array
    {
        return $this->genericResources;
    }
    /**
    * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
    String resources (e.g, `GPU=UUID1`).
    
    *
    * @param GenericResourcesItem[] $genericResources
    *
    * @return self
    */
    public function setGenericResources(array $genericResources) : self
    {
        $this->initialized['genericResources'] = true;
        $this->genericResources = $genericResources;
        return $this;
    }
}