<?php

namespace Mdshack\Docker\API\v1_41\Model;

class GraphDriverData extends \ArrayObject
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
     * Name of the storage driver.
     *
     * @var string
     */
    protected $name;

    /**
     * Low-level storage metadata, provided as key/value pairs.

    This information is driver-specific, and depends on the storage-driver
    in use, and should be used for informational purposes only.

     *
     * @var array<string, string>
     */
    protected $data;

    /**
     * Name of the storage driver.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the storage driver.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Low-level storage metadata, provided as key/value pairs.

    This information is driver-specific, and depends on the storage-driver
    in use, and should be used for informational purposes only.

     *
     * @return array<string, string>
     */
    public function getData(): iterable
    {
        return $this->data;
    }

    /**
     * Low-level storage metadata, provided as key/value pairs.

    This information is driver-specific, and depends on the storage-driver
    in use, and should be used for informational purposes only.

     *
     * @param  array<string, string>  $data
     */
    public function setData(iterable $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }
}
