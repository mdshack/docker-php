<?php

namespace Mdshack\Docker\API\v1_42\Model;

class PluginConfigUser extends \ArrayObject
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
    protected $uID;

    /**
     * @var int
     */
    protected $gID;

    public function getUID(): int
    {
        return $this->uID;
    }

    public function setUID(int $uID): self
    {
        $this->initialized['uID'] = true;
        $this->uID = $uID;

        return $this;
    }

    public function getGID(): int
    {
        return $this->gID;
    }

    public function setGID(int $gID): self
    {
        $this->initialized['gID'] = true;
        $this->gID = $gID;

        return $this;
    }
}
