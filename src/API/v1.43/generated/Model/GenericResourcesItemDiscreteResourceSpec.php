<?php

namespace Mdshack\Docker\API\v1_43\Model;

class GenericResourcesItemDiscreteResourceSpec extends \ArrayObject
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
     * @var string
     */
    protected $kind;

    /**
     * @var int
     */
    protected $value;

    public function getKind(): string
    {
        return $this->kind;
    }

    public function setKind(string $kind): self
    {
        $this->initialized['kind'] = true;
        $this->kind = $kind;

        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }
}
