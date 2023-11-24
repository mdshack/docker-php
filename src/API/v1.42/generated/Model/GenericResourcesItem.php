<?php

namespace Mdshack\Docker\API\v1_42\Model;

class GenericResourcesItem extends \ArrayObject
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
     * @var GenericResourcesItemNamedResourceSpec
     */
    protected $namedResourceSpec;

    /**
     * @var GenericResourcesItemDiscreteResourceSpec
     */
    protected $discreteResourceSpec;

    public function getNamedResourceSpec(): GenericResourcesItemNamedResourceSpec
    {
        return $this->namedResourceSpec;
    }

    public function setNamedResourceSpec(GenericResourcesItemNamedResourceSpec $namedResourceSpec): self
    {
        $this->initialized['namedResourceSpec'] = true;
        $this->namedResourceSpec = $namedResourceSpec;

        return $this;
    }

    public function getDiscreteResourceSpec(): GenericResourcesItemDiscreteResourceSpec
    {
        return $this->discreteResourceSpec;
    }

    public function setDiscreteResourceSpec(GenericResourcesItemDiscreteResourceSpec $discreteResourceSpec): self
    {
        $this->initialized['discreteResourceSpec'] = true;
        $this->discreteResourceSpec = $discreteResourceSpec;

        return $this;
    }
}
