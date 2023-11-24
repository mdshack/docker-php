<?php

namespace Mdshack\Docker\API\v1_43\Model;

class ObjectVersion extends \ArrayObject
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
     * @var int
     */
    protected $index;

    public function getIndex(): int
    {
        return $this->index;
    }

    public function setIndex(int $index): self
    {
        $this->initialized['index'] = true;
        $this->index = $index;

        return $this;
    }
}
