<?php

namespace Mdshack\Docker\API\v1_42\Model;

class ClusterVolumeSpec extends \ArrayObject
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
     * Group defines the volume group of this volume. Volumes belonging to
    the same group can be referred to by group name when creating
    Services.  Referring to a volume by group instructs Swarm to treat
    volumes in that group interchangeably for the purpose of scheduling.
    Volumes with an empty string for a group technically all belong to
    the same, emptystring group.

     *
     * @var string
     */
    protected $group;

    /**
     * Defines how the volume is used by tasks.
     *
     * @var ClusterVolumeSpecAccessMode
     */
    protected $accessMode;

    /**
     * Group defines the volume group of this volume. Volumes belonging to
    the same group can be referred to by group name when creating
    Services.  Referring to a volume by group instructs Swarm to treat
    volumes in that group interchangeably for the purpose of scheduling.
    Volumes with an empty string for a group technically all belong to
    the same, emptystring group.
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * Group defines the volume group of this volume. Volumes belonging to
    the same group can be referred to by group name when creating
    Services.  Referring to a volume by group instructs Swarm to treat
    volumes in that group interchangeably for the purpose of scheduling.
    Volumes with an empty string for a group technically all belong to
    the same, emptystring group.
     */
    public function setGroup(string $group): self
    {
        $this->initialized['group'] = true;
        $this->group = $group;

        return $this;
    }

    /**
     * Defines how the volume is used by tasks.
     */
    public function getAccessMode(): ClusterVolumeSpecAccessMode
    {
        return $this->accessMode;
    }

    /**
     * Defines how the volume is used by tasks.
     */
    public function setAccessMode(ClusterVolumeSpecAccessMode $accessMode): self
    {
        $this->initialized['accessMode'] = true;
        $this->accessMode = $accessMode;

        return $this;
    }
}
