<?php

namespace Mdshack\Docker\API\v1_40\Model;

class BuildCache extends \ArrayObject
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
     * Unique ID of the build cache record.
     *
     * @var string
     */
    protected $iD;
    /**
     * ID of the parent build cache record.
     *
     * @var string
     */
    protected $parent;
    /**
     * Cache record type.
     *
     * @var string
     */
    protected $type;
    /**
     * Description of the build-step that produced the build cache.
     *
     * @var string
     */
    protected $description;
    /**
     * Indicates if the build cache is in use.
     *
     * @var bool
     */
    protected $inUse;
    /**
     * Indicates if the build cache is shared.
     *
     * @var bool
     */
    protected $shared;
    /**
     * Amount of disk space used by the build cache (in bytes).
     *
     * @var int
     */
    protected $size;
    /**
    * Date and time at which the build cache was created in
    [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
    
    *
    * @var string
    */
    protected $createdAt;
    /**
    * Date and time at which the build cache was last used in
    [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
    
    *
    * @var string|null
    */
    protected $lastUsedAt;
    /**
     * 
     *
     * @var int
     */
    protected $usageCount;
    /**
     * Unique ID of the build cache record.
     *
     * @return string
     */
    public function getID() : string
    {
        return $this->iD;
    }
    /**
     * Unique ID of the build cache record.
     *
     * @param string $iD
     *
     * @return self
     */
    public function setID(string $iD) : self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;
        return $this;
    }
    /**
     * ID of the parent build cache record.
     *
     * @return string
     */
    public function getParent() : string
    {
        return $this->parent;
    }
    /**
     * ID of the parent build cache record.
     *
     * @param string $parent
     *
     * @return self
     */
    public function setParent(string $parent) : self
    {
        $this->initialized['parent'] = true;
        $this->parent = $parent;
        return $this;
    }
    /**
     * Cache record type.
     *
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }
    /**
     * Cache record type.
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type) : self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * Description of the build-step that produced the build cache.
     *
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }
    /**
     * Description of the build-step that produced the build cache.
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description) : self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }
    /**
     * Indicates if the build cache is in use.
     *
     * @return bool
     */
    public function getInUse() : bool
    {
        return $this->inUse;
    }
    /**
     * Indicates if the build cache is in use.
     *
     * @param bool $inUse
     *
     * @return self
     */
    public function setInUse(bool $inUse) : self
    {
        $this->initialized['inUse'] = true;
        $this->inUse = $inUse;
        return $this;
    }
    /**
     * Indicates if the build cache is shared.
     *
     * @return bool
     */
    public function getShared() : bool
    {
        return $this->shared;
    }
    /**
     * Indicates if the build cache is shared.
     *
     * @param bool $shared
     *
     * @return self
     */
    public function setShared(bool $shared) : self
    {
        $this->initialized['shared'] = true;
        $this->shared = $shared;
        return $this;
    }
    /**
     * Amount of disk space used by the build cache (in bytes).
     *
     * @return int
     */
    public function getSize() : int
    {
        return $this->size;
    }
    /**
     * Amount of disk space used by the build cache (in bytes).
     *
     * @param int $size
     *
     * @return self
     */
    public function setSize(int $size) : self
    {
        $this->initialized['size'] = true;
        $this->size = $size;
        return $this;
    }
    /**
    * Date and time at which the build cache was created in
    [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
    
    *
    * @return string
    */
    public function getCreatedAt() : string
    {
        return $this->createdAt;
    }
    /**
    * Date and time at which the build cache was created in
    [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
    
    *
    * @param string $createdAt
    *
    * @return self
    */
    public function setCreatedAt(string $createdAt) : self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
    * Date and time at which the build cache was last used in
    [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
    
    *
    * @return string|null
    */
    public function getLastUsedAt() : ?string
    {
        return $this->lastUsedAt;
    }
    /**
    * Date and time at which the build cache was last used in
    [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
    
    *
    * @param string|null $lastUsedAt
    *
    * @return self
    */
    public function setLastUsedAt(?string $lastUsedAt) : self
    {
        $this->initialized['lastUsedAt'] = true;
        $this->lastUsedAt = $lastUsedAt;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getUsageCount() : int
    {
        return $this->usageCount;
    }
    /**
     * 
     *
     * @param int $usageCount
     *
     * @return self
     */
    public function setUsageCount(int $usageCount) : self
    {
        $this->initialized['usageCount'] = true;
        $this->usageCount = $usageCount;
        return $this;
    }
}