<?php

namespace Mdshack\Docker\API\v1_41\Model;

class ServiceUpdateResponse extends \ArrayObject
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
     * Optional warning messages
     *
     * @var string[]
     */
    protected $warnings;

    /**
     * Optional warning messages
     *
     * @return string[]
     */
    public function getWarnings(): array
    {
        return $this->warnings;
    }

    /**
     * Optional warning messages
     *
     * @param  string[]  $warnings
     */
    public function setWarnings(array $warnings): self
    {
        $this->initialized['warnings'] = true;
        $this->warnings = $warnings;

        return $this;
    }
}
