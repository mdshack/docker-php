<?php

namespace Mdshack\Docker\API\v1_42\Model;

class Secret extends \ArrayObject
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
    protected $iD;

    /**
     * The version number of the object such as node, service, etc. This is needed
    to avoid conflicting writes. The client must send the version number along
    with the modified specification when updating these objects.

    This approach ensures safe concurrency and determinism in that the change
    on the object may not be applied if the version number has changed from the
    last read. In other words, if two update requests specify the same base
    version, only one of the requests can succeed. As a result, two separate
    update requests that happen at the same time will not unintentionally
    overwrite each other.

     *
     * @var ObjectVersion
     */
    protected $version;

    /**
     * @var string
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected $updatedAt;

    /**
     * @var SecretSpec
     */
    protected $spec;

    public function getID(): string
    {
        return $this->iD;
    }

    public function setID(string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

        return $this;
    }

    /**
     * The version number of the object such as node, service, etc. This is needed
    to avoid conflicting writes. The client must send the version number along
    with the modified specification when updating these objects.

    This approach ensures safe concurrency and determinism in that the change
    on the object may not be applied if the version number has changed from the
    last read. In other words, if two update requests specify the same base
    version, only one of the requests can succeed. As a result, two separate
    update requests that happen at the same time will not unintentionally
    overwrite each other.
     */
    public function getVersion(): ObjectVersion
    {
        return $this->version;
    }

    /**
     * The version number of the object such as node, service, etc. This is needed
    to avoid conflicting writes. The client must send the version number along
    with the modified specification when updating these objects.

    This approach ensures safe concurrency and determinism in that the change
    on the object may not be applied if the version number has changed from the
    last read. In other words, if two update requests specify the same base
    version, only one of the requests can succeed. As a result, two separate
    update requests that happen at the same time will not unintentionally
    overwrite each other.
     */
    public function setVersion(ObjectVersion $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;

        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getSpec(): SecretSpec
    {
        return $this->spec;
    }

    public function setSpec(SecretSpec $spec): self
    {
        $this->initialized['spec'] = true;
        $this->spec = $spec;

        return $this;
    }
}
