<?php

namespace Mdshack\Docker\API\v1_43\Model;

class ExecIdJsonGetResponse200 extends \ArrayObject
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
     * @var bool
     */
    protected $canRemove;

    /**
     * @var string
     */
    protected $detachKeys;

    /**
     * @var string
     */
    protected $iD;

    /**
     * @var bool
     */
    protected $running;

    /**
     * @var int
     */
    protected $exitCode;

    /**
     * @var ProcessConfig
     */
    protected $processConfig;

    /**
     * @var bool
     */
    protected $openStdin;

    /**
     * @var bool
     */
    protected $openStderr;

    /**
     * @var bool
     */
    protected $openStdout;

    /**
     * @var string
     */
    protected $containerID;

    /**
     * The system process ID for the exec process.
     *
     * @var int
     */
    protected $pid;

    public function getCanRemove(): bool
    {
        return $this->canRemove;
    }

    public function setCanRemove(bool $canRemove): self
    {
        $this->initialized['canRemove'] = true;
        $this->canRemove = $canRemove;

        return $this;
    }

    public function getDetachKeys(): string
    {
        return $this->detachKeys;
    }

    public function setDetachKeys(string $detachKeys): self
    {
        $this->initialized['detachKeys'] = true;
        $this->detachKeys = $detachKeys;

        return $this;
    }

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

    public function getRunning(): bool
    {
        return $this->running;
    }

    public function setRunning(bool $running): self
    {
        $this->initialized['running'] = true;
        $this->running = $running;

        return $this;
    }

    public function getExitCode(): int
    {
        return $this->exitCode;
    }

    public function setExitCode(int $exitCode): self
    {
        $this->initialized['exitCode'] = true;
        $this->exitCode = $exitCode;

        return $this;
    }

    public function getProcessConfig(): ProcessConfig
    {
        return $this->processConfig;
    }

    public function setProcessConfig(ProcessConfig $processConfig): self
    {
        $this->initialized['processConfig'] = true;
        $this->processConfig = $processConfig;

        return $this;
    }

    public function getOpenStdin(): bool
    {
        return $this->openStdin;
    }

    public function setOpenStdin(bool $openStdin): self
    {
        $this->initialized['openStdin'] = true;
        $this->openStdin = $openStdin;

        return $this;
    }

    public function getOpenStderr(): bool
    {
        return $this->openStderr;
    }

    public function setOpenStderr(bool $openStderr): self
    {
        $this->initialized['openStderr'] = true;
        $this->openStderr = $openStderr;

        return $this;
    }

    public function getOpenStdout(): bool
    {
        return $this->openStdout;
    }

    public function setOpenStdout(bool $openStdout): self
    {
        $this->initialized['openStdout'] = true;
        $this->openStdout = $openStdout;

        return $this;
    }

    public function getContainerID(): string
    {
        return $this->containerID;
    }

    public function setContainerID(string $containerID): self
    {
        $this->initialized['containerID'] = true;
        $this->containerID = $containerID;

        return $this;
    }

    /**
     * The system process ID for the exec process.
     */
    public function getPid(): int
    {
        return $this->pid;
    }

    /**
     * The system process ID for the exec process.
     */
    public function setPid(int $pid): self
    {
        $this->initialized['pid'] = true;
        $this->pid = $pid;

        return $this;
    }
}
