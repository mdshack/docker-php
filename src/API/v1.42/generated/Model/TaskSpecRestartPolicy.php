<?php

namespace Mdshack\Docker\API\v1_42\Model;

class TaskSpecRestartPolicy extends \ArrayObject
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
     * Condition for restart.
     *
     * @var string
     */
    protected $condition;

    /**
     * Delay between restart attempts.
     *
     * @var int
     */
    protected $delay;

    /**
     * Maximum attempts to restart a given container before giving up
    (default value is 0, which is ignored).

     *
     * @var int
     */
    protected $maxAttempts = 0;

    /**
     * Windows is the time window used to evaluate the restart policy
    (default value is 0, which is unbounded).

     *
     * @var int
     */
    protected $window = 0;

    /**
     * Condition for restart.
     */
    public function getCondition(): string
    {
        return $this->condition;
    }

    /**
     * Condition for restart.
     */
    public function setCondition(string $condition): self
    {
        $this->initialized['condition'] = true;
        $this->condition = $condition;

        return $this;
    }

    /**
     * Delay between restart attempts.
     */
    public function getDelay(): int
    {
        return $this->delay;
    }

    /**
     * Delay between restart attempts.
     */
    public function setDelay(int $delay): self
    {
        $this->initialized['delay'] = true;
        $this->delay = $delay;

        return $this;
    }

    /**
     * Maximum attempts to restart a given container before giving up
    (default value is 0, which is ignored).
     */
    public function getMaxAttempts(): int
    {
        return $this->maxAttempts;
    }

    /**
     * Maximum attempts to restart a given container before giving up
    (default value is 0, which is ignored).
     */
    public function setMaxAttempts(int $maxAttempts): self
    {
        $this->initialized['maxAttempts'] = true;
        $this->maxAttempts = $maxAttempts;

        return $this;
    }

    /**
     * Windows is the time window used to evaluate the restart policy
    (default value is 0, which is unbounded).
     */
    public function getWindow(): int
    {
        return $this->window;
    }

    /**
     * Windows is the time window used to evaluate the restart policy
    (default value is 0, which is unbounded).
     */
    public function setWindow(int $window): self
    {
        $this->initialized['window'] = true;
        $this->window = $window;

        return $this;
    }
}
