<?php

namespace Mdshack\Docker\API\v1_41\Model;

class TaskSpecPlacementPreferencesItem extends \ArrayObject
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
     * @var TaskSpecPlacementPreferencesItemSpread
     */
    protected $spread;
    /**
     * 
     *
     * @return TaskSpecPlacementPreferencesItemSpread
     */
    public function getSpread() : TaskSpecPlacementPreferencesItemSpread
    {
        return $this->spread;
    }
    /**
     * 
     *
     * @param TaskSpecPlacementPreferencesItemSpread $spread
     *
     * @return self
     */
    public function setSpread(TaskSpecPlacementPreferencesItemSpread $spread) : self
    {
        $this->initialized['spread'] = true;
        $this->spread = $spread;
        return $this;
    }
}