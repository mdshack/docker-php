<?php

namespace Mdshack\Docker\API\v1_40\Model;

class ImageInspectRootFS extends \ArrayObject
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
    protected $type;
    /**
     * 
     *
     * @var string[]
     */
    protected $layers;
    /**
     * 
     *
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }
    /**
     * 
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type) : self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * 
     *
     * @return string[]
     */
    public function getLayers() : array
    {
        return $this->layers;
    }
    /**
     * 
     *
     * @param string[] $layers
     *
     * @return self
     */
    public function setLayers(array $layers) : self
    {
        $this->initialized['layers'] = true;
        $this->layers = $layers;
        return $this;
    }
}