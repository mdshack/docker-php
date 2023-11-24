<?php

namespace Mdshack\Docker\API\v1_42\Model;

class Volume extends \ArrayObject
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
     * Name of the volume.
     *
     * @var string
     */
    protected $name;

    /**
     * Name of the volume driver used by the volume.
     *
     * @var string
     */
    protected $driver;

    /**
     * Mount path of the volume on the host.
     *
     * @var string
     */
    protected $mountpoint;

    /**
     * Date/Time the volume was created.
     *
     * @var string
     */
    protected $createdAt;

    /**
     * Low-level details about the volume, provided by the volume driver.
    Details are returned as a map with key/value pairs:
    `{"key":"value","key2":"value2"}`.

    The `Status` field is optional, and is omitted if the volume driver
    does not support this feature.

     *
     * @var array<string, VolumeStatusItem>
     */
    protected $status;

    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>
     */
    protected $labels;

    /**
     * The level at which the volume exists. Either `global` for cluster-wide,
    or `local` for machine level.

     *
     * @var string
     */
    protected $scope = 'local';

    /**
     * Options and information specific to, and only present on, Swarm CSI
    cluster volumes.

     *
     * @var ClusterVolume
     */
    protected $clusterVolume;

    /**
     * The driver specific options used when creating the volume.
     *
     * @var array<string, string>
     */
    protected $options;

    /**
     * Usage details about the volume. This information is used by the
    `GET /system/df` endpoint, and omitted in other endpoints.

     *
     * @var VolumeUsageData|null
     */
    protected $usageData;

    /**
     * Name of the volume.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the volume.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Name of the volume driver used by the volume.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * Name of the volume driver used by the volume.
     */
    public function setDriver(string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    /**
     * Mount path of the volume on the host.
     */
    public function getMountpoint(): string
    {
        return $this->mountpoint;
    }

    /**
     * Mount path of the volume on the host.
     */
    public function setMountpoint(string $mountpoint): self
    {
        $this->initialized['mountpoint'] = true;
        $this->mountpoint = $mountpoint;

        return $this;
    }

    /**
     * Date/Time the volume was created.
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Date/Time the volume was created.
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Low-level details about the volume, provided by the volume driver.
    Details are returned as a map with key/value pairs:
    `{"key":"value","key2":"value2"}`.

    The `Status` field is optional, and is omitted if the volume driver
    does not support this feature.

     *
     * @return array<string, VolumeStatusItem>
     */
    public function getStatus(): iterable
    {
        return $this->status;
    }

    /**
     * Low-level details about the volume, provided by the volume driver.
    Details are returned as a map with key/value pairs:
    `{"key":"value","key2":"value2"}`.

    The `Status` field is optional, and is omitted if the volume driver
    does not support this feature.

     *
     * @param  array<string, VolumeStatusItem>  $status
     */
    public function setStatus(iterable $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * User-defined key/value metadata.
     *
     * @return array<string, string>
     */
    public function getLabels(): iterable
    {
        return $this->labels;
    }

    /**
     * User-defined key/value metadata.
     *
     * @param  array<string, string>  $labels
     */
    public function setLabels(iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    /**
     * The level at which the volume exists. Either `global` for cluster-wide,
    or `local` for machine level.
     */
    public function getScope(): string
    {
        return $this->scope;
    }

    /**
     * The level at which the volume exists. Either `global` for cluster-wide,
    or `local` for machine level.
     */
    public function setScope(string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    /**
     * Options and information specific to, and only present on, Swarm CSI
    cluster volumes.
     */
    public function getClusterVolume(): ClusterVolume
    {
        return $this->clusterVolume;
    }

    /**
     * Options and information specific to, and only present on, Swarm CSI
    cluster volumes.
     */
    public function setClusterVolume(ClusterVolume $clusterVolume): self
    {
        $this->initialized['clusterVolume'] = true;
        $this->clusterVolume = $clusterVolume;

        return $this;
    }

    /**
     * The driver specific options used when creating the volume.
     *
     * @return array<string, string>
     */
    public function getOptions(): iterable
    {
        return $this->options;
    }

    /**
     * The driver specific options used when creating the volume.
     *
     * @param  array<string, string>  $options
     */
    public function setOptions(iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }

    /**
     * Usage details about the volume. This information is used by the
    `GET /system/df` endpoint, and omitted in other endpoints.
     */
    public function getUsageData(): ?VolumeUsageData
    {
        return $this->usageData;
    }

    /**
     * Usage details about the volume. This information is used by the
    `GET /system/df` endpoint, and omitted in other endpoints.
     */
    public function setUsageData(?VolumeUsageData $usageData): self
    {
        $this->initialized['usageData'] = true;
        $this->usageData = $usageData;

        return $this;
    }
}
