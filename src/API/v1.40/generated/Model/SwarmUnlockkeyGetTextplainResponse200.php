<?php

namespace Mdshack\Docker\API\v1_40\Model;

class SwarmUnlockkeyGetTextplainResponse200 extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * The swarm's unlock key.
     *
     * @var string
     */
    protected $unlockKey;
    /**
     * The swarm's unlock key.
     *
     * @return string
     */
    public function getUnlockKey() : string
    {
        return $this->unlockKey;
    }
    /**
     * The swarm's unlock key.
     *
     * @param string $unlockKey
     *
     * @return self
     */
    public function setUnlockKey(string $unlockKey) : self
    {
        $this->initialized['unlockKey'] = true;
        $this->unlockKey = $unlockKey;
        return $this;
    }
}