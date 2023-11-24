<?php

namespace Mdshack\Docker\API\v1_42\Model;

class ClusterVolumeSpecAccessModeAccessibilityRequirements extends \ArrayObject
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
     * A list of required topologies, at least one of which the
    volume must be accessible from.

     *
     * @var array<string, string>[]
     */
    protected $requisite;

    /**
     * A list of topologies that the volume should attempt to be
    provisioned in.

     *
     * @var array<string, string>[]
     */
    protected $preferred;

    /**
     * A list of required topologies, at least one of which the
    volume must be accessible from.

     *
     * @return array<string, string>[]
     */
    public function getRequisite(): array
    {
        return $this->requisite;
    }

    /**
     * A list of required topologies, at least one of which the
    volume must be accessible from.

     *
     * @param  array<string, string>[]  $requisite
     */
    public function setRequisite(array $requisite): self
    {
        $this->initialized['requisite'] = true;
        $this->requisite = $requisite;

        return $this;
    }

    /**
     * A list of topologies that the volume should attempt to be
    provisioned in.

     *
     * @return array<string, string>[]
     */
    public function getPreferred(): array
    {
        return $this->preferred;
    }

    /**
     * A list of topologies that the volume should attempt to be
    provisioned in.

     *
     * @param  array<string, string>[]  $preferred
     */
    public function setPreferred(array $preferred): self
    {
        $this->initialized['preferred'] = true;
        $this->preferred = $preferred;

        return $this;
    }
}
