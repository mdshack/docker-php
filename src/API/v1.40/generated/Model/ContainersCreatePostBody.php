<?php

namespace Mdshack\Docker\API\v1_40\Model;

class ContainersCreatePostBody extends \ArrayObject
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
     * The hostname to use for the container, as a valid RFC 1123 hostname.
     *
     * @var string
     */
    protected $hostname;

    /**
     * The domain name to use for the container.
     *
     * @var string
     */
    protected $domainname;

    /**
     * The user that commands are run as inside the container.
     *
     * @var string
     */
    protected $user;

    /**
     * Whether to attach to `stdin`.
     *
     * @var bool
     */
    protected $attachStdin = false;

    /**
     * Whether to attach to `stdout`.
     *
     * @var bool
     */
    protected $attachStdout = true;

    /**
     * Whether to attach to `stderr`.
     *
     * @var bool
     */
    protected $attachStderr = true;

    /**
     * An object mapping ports to an empty object in the form:

    `{"<port>/<tcp|udp|sctp>": {}}`

     *
     * @var array<string, ContainerConfigExposedPortsItem>|null
     */
    protected $exposedPorts;

    /**
     * Attach standard streams to a TTY, including `stdin` if it is not closed.
     *
     * @var bool
     */
    protected $tty = false;

    /**
     * Open `stdin`
     *
     * @var bool
     */
    protected $openStdin = false;

    /**
     * Close `stdin` after one attached client disconnects
     *
     * @var bool
     */
    protected $stdinOnce = false;

    /**
     * A list of environment variables to set inside the container in the
    form `["VAR=value", ...]`. A variable without `=` is removed from the
    environment, rather than to have an empty value.

     *
     * @var string[]
     */
    protected $env;

    /**
     * Command to run specified as a string or an array of strings.
     *
     * @var string[]
     */
    protected $cmd;

    /**
     * A test to perform to check that the container is healthy.
     *
     * @var HealthConfig
     */
    protected $healthcheck;

    /**
     * Command is already escaped (Windows only)
     *
     * @var bool|null
     */
    protected $argsEscaped = false;

    /**
     * The name (or reference) of the image to use when creating the container,
    or which was used when the container was created.

     *
     * @var string
     */
    protected $image;

    /**
     * An object mapping mount point paths inside the container to empty
    objects.

     *
     * @var array<string, ContainerConfigVolumesItem>
     */
    protected $volumes;

    /**
     * The working directory for commands to run in.
     *
     * @var string
     */
    protected $workingDir;

    /**
     * The entry point for the container as a string or an array of strings.

    If the array consists of exactly one empty string (`[""]`) then the
    entry point is reset to system default (i.e., the entry point used by
    docker when there is no `ENTRYPOINT` instruction in the `Dockerfile`).

     *
     * @var string[]
     */
    protected $entrypoint;

    /**
     * Disable networking for the container.
     *
     * @var bool|null
     */
    protected $networkDisabled;

    /**
     * MAC address of the container.
     *
     * @var string|null
     */
    protected $macAddress;

    /**
     * `ONBUILD` metadata that were defined in the image's `Dockerfile`.
     *
     * @var string[]|null
     */
    protected $onBuild;

    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>
     */
    protected $labels;

    /**
     * Signal to stop a container as a string or unsigned integer.
     *
     * @var string|null
     */
    protected $stopSignal;

    /**
     * Timeout to stop a container in seconds.
     *
     * @var int|null
     */
    protected $stopTimeout;

    /**
     * Shell for when `RUN`, `CMD`, and `ENTRYPOINT` uses a shell.
     *
     * @var string[]|null
     */
    protected $shell;

    /**
     * Container configuration that depends on the host we are running on
     *
     * @var HostConfig
     */
    protected $hostConfig;

    /**
     * NetworkingConfig represents the container's networking configuration for
    each of its interfaces.
    It is used for the networking configs specified in the `docker create`
    and `docker network connect` commands.

     *
     * @var NetworkingConfig
     */
    protected $networkingConfig;

    /**
     * The hostname to use for the container, as a valid RFC 1123 hostname.
     */
    public function getHostname(): string
    {
        return $this->hostname;
    }

    /**
     * The hostname to use for the container, as a valid RFC 1123 hostname.
     */
    public function setHostname(string $hostname): self
    {
        $this->initialized['hostname'] = true;
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * The domain name to use for the container.
     */
    public function getDomainname(): string
    {
        return $this->domainname;
    }

    /**
     * The domain name to use for the container.
     */
    public function setDomainname(string $domainname): self
    {
        $this->initialized['domainname'] = true;
        $this->domainname = $domainname;

        return $this;
    }

    /**
     * The user that commands are run as inside the container.
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * The user that commands are run as inside the container.
     */
    public function setUser(string $user): self
    {
        $this->initialized['user'] = true;
        $this->user = $user;

        return $this;
    }

    /**
     * Whether to attach to `stdin`.
     */
    public function getAttachStdin(): bool
    {
        return $this->attachStdin;
    }

    /**
     * Whether to attach to `stdin`.
     */
    public function setAttachStdin(bool $attachStdin): self
    {
        $this->initialized['attachStdin'] = true;
        $this->attachStdin = $attachStdin;

        return $this;
    }

    /**
     * Whether to attach to `stdout`.
     */
    public function getAttachStdout(): bool
    {
        return $this->attachStdout;
    }

    /**
     * Whether to attach to `stdout`.
     */
    public function setAttachStdout(bool $attachStdout): self
    {
        $this->initialized['attachStdout'] = true;
        $this->attachStdout = $attachStdout;

        return $this;
    }

    /**
     * Whether to attach to `stderr`.
     */
    public function getAttachStderr(): bool
    {
        return $this->attachStderr;
    }

    /**
     * Whether to attach to `stderr`.
     */
    public function setAttachStderr(bool $attachStderr): self
    {
        $this->initialized['attachStderr'] = true;
        $this->attachStderr = $attachStderr;

        return $this;
    }

    /**
     * An object mapping ports to an empty object in the form:

    `{"<port>/<tcp|udp|sctp>": {}}`

     *
     * @return array<string, ContainerConfigExposedPortsItem>|null
     */
    public function getExposedPorts(): ?iterable
    {
        return $this->exposedPorts;
    }

    /**
     * An object mapping ports to an empty object in the form:

    `{"<port>/<tcp|udp|sctp>": {}}`

     *
     * @param  array<string, ContainerConfigExposedPortsItem>|null  $exposedPorts
     */
    public function setExposedPorts(?iterable $exposedPorts): self
    {
        $this->initialized['exposedPorts'] = true;
        $this->exposedPorts = $exposedPorts;

        return $this;
    }

    /**
     * Attach standard streams to a TTY, including `stdin` if it is not closed.
     */
    public function getTty(): bool
    {
        return $this->tty;
    }

    /**
     * Attach standard streams to a TTY, including `stdin` if it is not closed.
     */
    public function setTty(bool $tty): self
    {
        $this->initialized['tty'] = true;
        $this->tty = $tty;

        return $this;
    }

    /**
     * Open `stdin`
     */
    public function getOpenStdin(): bool
    {
        return $this->openStdin;
    }

    /**
     * Open `stdin`
     */
    public function setOpenStdin(bool $openStdin): self
    {
        $this->initialized['openStdin'] = true;
        $this->openStdin = $openStdin;

        return $this;
    }

    /**
     * Close `stdin` after one attached client disconnects
     */
    public function getStdinOnce(): bool
    {
        return $this->stdinOnce;
    }

    /**
     * Close `stdin` after one attached client disconnects
     */
    public function setStdinOnce(bool $stdinOnce): self
    {
        $this->initialized['stdinOnce'] = true;
        $this->stdinOnce = $stdinOnce;

        return $this;
    }

    /**
     * A list of environment variables to set inside the container in the
    form `["VAR=value", ...]`. A variable without `=` is removed from the
    environment, rather than to have an empty value.

     *
     * @return string[]
     */
    public function getEnv(): array
    {
        return $this->env;
    }

    /**
     * A list of environment variables to set inside the container in the
    form `["VAR=value", ...]`. A variable without `=` is removed from the
    environment, rather than to have an empty value.

     *
     * @param  string[]  $env
     */
    public function setEnv(array $env): self
    {
        $this->initialized['env'] = true;
        $this->env = $env;

        return $this;
    }

    /**
     * Command to run specified as a string or an array of strings.
     *
     * @return string[]
     */
    public function getCmd(): array
    {
        return $this->cmd;
    }

    /**
     * Command to run specified as a string or an array of strings.
     *
     * @param  string[]  $cmd
     */
    public function setCmd(array $cmd): self
    {
        $this->initialized['cmd'] = true;
        $this->cmd = $cmd;

        return $this;
    }

    /**
     * A test to perform to check that the container is healthy.
     */
    public function getHealthcheck(): HealthConfig
    {
        return $this->healthcheck;
    }

    /**
     * A test to perform to check that the container is healthy.
     */
    public function setHealthcheck(HealthConfig $healthcheck): self
    {
        $this->initialized['healthcheck'] = true;
        $this->healthcheck = $healthcheck;

        return $this;
    }

    /**
     * Command is already escaped (Windows only)
     */
    public function getArgsEscaped(): ?bool
    {
        return $this->argsEscaped;
    }

    /**
     * Command is already escaped (Windows only)
     */
    public function setArgsEscaped(?bool $argsEscaped): self
    {
        $this->initialized['argsEscaped'] = true;
        $this->argsEscaped = $argsEscaped;

        return $this;
    }

    /**
     * The name (or reference) of the image to use when creating the container,
    or which was used when the container was created.
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * The name (or reference) of the image to use when creating the container,
    or which was used when the container was created.
     */
    public function setImage(string $image): self
    {
        $this->initialized['image'] = true;
        $this->image = $image;

        return $this;
    }

    /**
     * An object mapping mount point paths inside the container to empty
    objects.

     *
     * @return array<string, ContainerConfigVolumesItem>
     */
    public function getVolumes(): iterable
    {
        return $this->volumes;
    }

    /**
     * An object mapping mount point paths inside the container to empty
    objects.

     *
     * @param  array<string, ContainerConfigVolumesItem>  $volumes
     */
    public function setVolumes(iterable $volumes): self
    {
        $this->initialized['volumes'] = true;
        $this->volumes = $volumes;

        return $this;
    }

    /**
     * The working directory for commands to run in.
     */
    public function getWorkingDir(): string
    {
        return $this->workingDir;
    }

    /**
     * The working directory for commands to run in.
     */
    public function setWorkingDir(string $workingDir): self
    {
        $this->initialized['workingDir'] = true;
        $this->workingDir = $workingDir;

        return $this;
    }

    /**
     * The entry point for the container as a string or an array of strings.

    If the array consists of exactly one empty string (`[""]`) then the
    entry point is reset to system default (i.e., the entry point used by
    docker when there is no `ENTRYPOINT` instruction in the `Dockerfile`).

     *
     * @return string[]
     */
    public function getEntrypoint(): array
    {
        return $this->entrypoint;
    }

    /**
     * The entry point for the container as a string or an array of strings.

    If the array consists of exactly one empty string (`[""]`) then the
    entry point is reset to system default (i.e., the entry point used by
    docker when there is no `ENTRYPOINT` instruction in the `Dockerfile`).

     *
     * @param  string[]  $entrypoint
     */
    public function setEntrypoint(array $entrypoint): self
    {
        $this->initialized['entrypoint'] = true;
        $this->entrypoint = $entrypoint;

        return $this;
    }

    /**
     * Disable networking for the container.
     */
    public function getNetworkDisabled(): ?bool
    {
        return $this->networkDisabled;
    }

    /**
     * Disable networking for the container.
     */
    public function setNetworkDisabled(?bool $networkDisabled): self
    {
        $this->initialized['networkDisabled'] = true;
        $this->networkDisabled = $networkDisabled;

        return $this;
    }

    /**
     * MAC address of the container.
     */
    public function getMacAddress(): ?string
    {
        return $this->macAddress;
    }

    /**
     * MAC address of the container.
     */
    public function setMacAddress(?string $macAddress): self
    {
        $this->initialized['macAddress'] = true;
        $this->macAddress = $macAddress;

        return $this;
    }

    /**
     * `ONBUILD` metadata that were defined in the image's `Dockerfile`.
     *
     * @return string[]|null
     */
    public function getOnBuild(): ?array
    {
        return $this->onBuild;
    }

    /**
     * `ONBUILD` metadata that were defined in the image's `Dockerfile`.
     *
     * @param  string[]|null  $onBuild
     */
    public function setOnBuild(?array $onBuild): self
    {
        $this->initialized['onBuild'] = true;
        $this->onBuild = $onBuild;

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
     * Signal to stop a container as a string or unsigned integer.
     */
    public function getStopSignal(): ?string
    {
        return $this->stopSignal;
    }

    /**
     * Signal to stop a container as a string or unsigned integer.
     */
    public function setStopSignal(?string $stopSignal): self
    {
        $this->initialized['stopSignal'] = true;
        $this->stopSignal = $stopSignal;

        return $this;
    }

    /**
     * Timeout to stop a container in seconds.
     */
    public function getStopTimeout(): ?int
    {
        return $this->stopTimeout;
    }

    /**
     * Timeout to stop a container in seconds.
     */
    public function setStopTimeout(?int $stopTimeout): self
    {
        $this->initialized['stopTimeout'] = true;
        $this->stopTimeout = $stopTimeout;

        return $this;
    }

    /**
     * Shell for when `RUN`, `CMD`, and `ENTRYPOINT` uses a shell.
     *
     * @return string[]|null
     */
    public function getShell(): ?array
    {
        return $this->shell;
    }

    /**
     * Shell for when `RUN`, `CMD`, and `ENTRYPOINT` uses a shell.
     *
     * @param  string[]|null  $shell
     */
    public function setShell(?array $shell): self
    {
        $this->initialized['shell'] = true;
        $this->shell = $shell;

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
     * NetworkingConfig represents the container's networking configuration for
    each of its interfaces.
    It is used for the networking configs specified in the `docker create`
    and `docker network connect` commands.
     */
    public function getNetworkingConfig(): NetworkingConfig
    {
        return $this->networkingConfig;
    }

    /**
     * NetworkingConfig represents the container's networking configuration for
    each of its interfaces.
    It is used for the networking configs specified in the `docker create`
    and `docker network connect` commands.
     */
    public function setNetworkingConfig(NetworkingConfig $networkingConfig): self
    {
        $this->initialized['networkingConfig'] = true;
        $this->networkingConfig = $networkingConfig;

        return $this;
    }
}
