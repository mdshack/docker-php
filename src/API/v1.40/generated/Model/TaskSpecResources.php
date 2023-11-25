<?php

namespace Mdshack\Docker\API\v1_40\Model;

class TaskSpecResources extends \ArrayObject
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
    * An object describing the resources which can be advertised by a node and
    requested by a task.
    
    *
    * @var ResourceObject
    */
    protected $limits;
    /**
    * An object describing the resources which can be advertised by a node and
    requested by a task.
    
    *
    * @var ResourceObject
    */
    protected $reservations;
    /**
    * An object describing the resources which can be advertised by a node and
    requested by a task.
    
    *
    * @return ResourceObject
    */
    public function getLimits() : ResourceObject
    {
        return $this->limits;
    }
    /**
    * An object describing the resources which can be advertised by a node and
    requested by a task.
    
    *
    * @param ResourceObject $limits
    *
    * @return self
    */
    public function setLimits(ResourceObject $limits) : self
    {
        $this->initialized['limits'] = true;
        $this->limits = $limits;
        return $this;
    }
    /**
    * An object describing the resources which can be advertised by a node and
    requested by a task.
    
    *
    * @return ResourceObject
    */
    public function getReservations() : ResourceObject
    {
        return $this->reservations;
    }
    /**
    * An object describing the resources which can be advertised by a node and
    requested by a task.
    
    *
    * @param ResourceObject $reservations
    *
    * @return self
    */
    public function setReservations(ResourceObject $reservations) : self
    {
        $this->initialized['reservations'] = true;
        $this->reservations = $reservations;
        return $this;
    }
}