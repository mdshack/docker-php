<?php

namespace Mdshack\Docker\API\v1_43\Model;

class ContainersIdJsonGetResponse200 extends \ArrayObject
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
     * The ID of the container
     *
     * @var string
     */
    protected $id;

    /**
     * The time the container was created
     *
     * @var string
     */
    protected $created;

    /**
     * The path to the command being run
     *
     * @var string
     */
    protected $path;

    /**
     * The arguments to the command being run
     *
     * @var string[]
     */
    protected $args;

    /**
     * ContainerState stores container's running state. It's part of ContainerJSONBase
    and will be returned by the "inspect" command.

     *
     * @var ContainerState|null
     */
    protected $state;

    /**
     * The container's image ID
     *
     * @var string
     */
    protected $image;

    /**
     * @var string
     */
    protected $resolvConfPath;

    /**
     * @var string
     */
    protected $hostnamePath;

    /**
     * @var string
     */
    protected $hostsPath;

    /**
     * @var string
     */
    protected $logPath;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $restartCount;

    /**
     * @var string
     */
    protected $driver;

    /**
     * @var string
     */
    protected $platform;

    /**
     * @var string
     */
    protected $mountLabel;

    /**
     * @var string
     */
    protected $processLabel;

    /**
     * @var string
     */
    protected $appArmorProfile;

    /**
     * IDs of exec instances that are running in the container.
     *
     * @var string[]|null
     */
    protected $execIDs;

    /**
     * Container configuration that depends on the host we are running on
     *
     * @var HostConfig
     */
    protected $hostConfig;

    /**
     * Information about the storage driver used to store the container's and
    image's filesystem.

     *
     * @var GraphDriverData
     */
    protected $graphDriver;

    /**
     * The size of files that have been created or changed by this
    container.

     *
     * @var int
     */
    protected $sizeRw;

    /**
     * The total size of all the files in this container.
     *
     * @var int
     */
    protected $sizeRootFs;

    /**
     * @var MountPoint[]
     */
    protected $mounts;

    /**
     * Configuration for a container that is portable between hosts.

    When used as `ContainerConfig` field in an image, `ContainerConfig` is an
    optional field containing the configuration of the container that was last
    committed when creating the image.

    Previous versions of Docker builder used this field to store build cache,
    and it is not in active use anymore.

     *
     * @var ContainerConfig
     */
    protected $config;

    /**
     * NetworkSettings exposes the network settings in the API
     *
     * @var NetworkSettings
     */
    protected $networkSettings;

    /**
     * The ID of the container
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the container
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The time the container was created
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * The time the container was created
     */
    public function setCreated(string $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    /**
     * The path to the command being run
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * The path to the command being run
     */
    public function setPath(string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;

        return $this;
    }

    /**
     * The arguments to the command being run
     *
     * @return string[]
     */
    public function getArgs(): array
    {
        return $this->args;
    }

    /**
     * The arguments to the command being run
     *
     * @param  string[]  $args
     */
    public function setArgs(array $args): self
    {
        $this->initialized['args'] = true;
        $this->args = $args;

        return $this;
    }

    /**
     * ContainerState stores container's running state. It's part of ContainerJSONBase
    and will be returned by the "inspect" command.
     */
    public function getState(): ?ContainerState
    {
        return $this->state;
    }

    /**
     * ContainerState stores container's running state. It's part of ContainerJSONBase
    and will be returned by the "inspect" command.
     */
    public function setState(?ContainerState $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;

        return $this;
    }

    /**
     * The container's image ID
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * The container's image ID
     */
    public function setImage(string $image): self
    {
        $this->initialized['image'] = true;
        $this->image = $image;

        return $this;
    }

    public function getResolvConfPath(): string
    {
        return $this->resolvConfPath;
    }

    public function setResolvConfPath(string $resolvConfPath): self
    {
        $this->initialized['resolvConfPath'] = true;
        $this->resolvConfPath = $resolvConfPath;

        return $this;
    }

    public function getHostnamePath(): string
    {
        return $this->hostnamePath;
    }

    public function setHostnamePath(string $hostnamePath): self
    {
        $this->initialized['hostnamePath'] = true;
        $this->hostnamePath = $hostnamePath;

        return $this;
    }

    public function getHostsPath(): string
    {
        return $this->hostsPath;
    }

    public function setHostsPath(string $hostsPath): self
    {
        $this->initialized['hostsPath'] = true;
        $this->hostsPath = $hostsPath;

        return $this;
    }

    public function getLogPath(): string
    {
        return $this->logPath;
    }

    public function setLogPath(string $logPath): self
    {
        $this->initialized['logPath'] = true;
        $this->logPath = $logPath;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function getRestartCount(): int
    {
        return $this->restartCount;
    }

    public function setRestartCount(int $restartCount): self
    {
        $this->initialized['restartCount'] = true;
        $this->restartCount = $restartCount;

        return $this;
    }

    public function getDriver(): string
    {
        return $this->driver;
    }

    public function setDriver(string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    public function getPlatform(): string
    {
        return $this->platform;
    }

    public function setPlatform(string $platform): self
    {
        $this->initialized['platform'] = true;
        $this->platform = $platform;

        return $this;
    }

    public function getMountLabel(): string
    {
        return $this->mountLabel;
    }

    public function setMountLabel(string $mountLabel): self
    {
        $this->initialized['mountLabel'] = true;
        $this->mountLabel = $mountLabel;

        return $this;
    }

    public function getProcessLabel(): string
    {
        return $this->processLabel;
    }

    public function setProcessLabel(string $processLabel): self
    {
        $this->initialized['processLabel'] = true;
        $this->processLabel = $processLabel;

        return $this;
    }

    public function getAppArmorProfile(): string
    {
        return $this->appArmorProfile;
    }

    public function setAppArmorProfile(string $appArmorProfile): self
    {
        $this->initialized['appArmorProfile'] = true;
        $this->appArmorProfile = $appArmorProfile;

        return $this;
    }

    /**
     * IDs of exec instances that are running in the container.
     *
     * @return string[]|null
     */
    public function getExecIDs(): ?array
    {
        return $this->execIDs;
    }

    /**
     * IDs of exec instances that are running in the container.
     *
     * @param  string[]|null  $execIDs
     */
    public function setExecIDs(?array $execIDs): self
    {
        $this->initialized['execIDs'] = true;
        $this->execIDs = $execIDs;

        return $this;
    }

    /**
     * Container configuration that depends on the host we are running on
     */
    public function getHostConfig(): HostConfig
    {
        return $this->hostConfig;
    }

    /**
     * Container configuration that depends on the host we are running on
     */
    public function setHostConfig(HostConfig $hostConfig): self
    {
        $this->initialized['hostConfig'] = true;
        $this->hostConfig = $hostConfig;

        return $this;
    }

    /**
     * Information about the storage driver used to store the container's and
    image's filesystem.
     */
    public function getGraphDriver(): GraphDriverData
    {
        return $this->graphDriver;
    }

    /**
     * Information about the storage driver used to store the container's and
    image's filesystem.
     */
    public function setGraphDriver(GraphDriverData $graphDriver): self
    {
        $this->initialized['graphDriver'] = true;
        $this->graphDriver = $graphDriver;

        return $this;
    }

    /**
     * The size of files that have been created or changed by this
    container.
     */
    public function getSizeRw(): int
    {
        return $this->sizeRw;
    }

    /**
     * The size of files that have been created or changed by this
    container.
     */
    public function setSizeRw(int $sizeRw): self
    {
        $this->initialized['sizeRw'] = true;
        $this->sizeRw = $sizeRw;

        return $this;
    }

    /**
     * The total size of all the files in this container.
     */
    public function getSizeRootFs(): int
    {
        return $this->sizeRootFs;
    }

    /**
     * The total size of all the files in this container.
     */
    public function setSizeRootFs(int $sizeRootFs): self
    {
        $this->initialized['sizeRootFs'] = true;
        $this->sizeRootFs = $sizeRootFs;

        return $this;
    }

    /**
     * @return MountPoint[]
     */
    public function getMounts(): array
    {
        return $this->mounts;
    }

    /**
     * @param  MountPoint[]  $mounts
     */
    public function setMounts(array $mounts): self
    {
        $this->initialized['mounts'] = true;
        $this->mounts = $mounts;

        return $this;
    }

    /**
     * Configuration for a container that is portable between hosts.

    When used as `ContainerConfig` field in an image, `ContainerConfig` is an
    optional field containing the configuration of the container that was last
    committed when creating the image.

    Previous versions of Docker builder used this field to store build cache,
    and it is not in active use anymore.
     */
    public function getConfig(): ContainerConfig
    {
        return $this->config;
    }

    /**
     * Configuration for a container that is portable between hosts.

    When used as `ContainerConfig` field in an image, `ContainerConfig` is an
    optional field containing the configuration of the container that was last
    committed when creating the image.

    Previous versions of Docker builder used this field to store build cache,
    and it is not in active use anymore.
     */
    public function setConfig(ContainerConfig $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }

    /**
     * NetworkSettings exposes the network settings in the API
     */
    public function getNetworkSettings(): NetworkSettings
    {
        return $this->networkSettings;
    }

    /**
     * NetworkSettings exposes the network settings in the API
     */
    public function setNetworkSettings(NetworkSettings $networkSettings): self
    {
        $this->initialized['networkSettings'] = true;
        $this->networkSettings = $networkSettings;

        return $this;
    }
}
