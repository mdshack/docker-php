<?php

namespace Mdshack\Docker\API\v1_42\Model;

class OCIDescriptor extends \ArrayObject
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
     * The media type of the object this schema refers to.
     *
     * @var string
     */
    protected $mediaType;

    /**
     * The digest of the targeted content.
     *
     * @var string
     */
    protected $digest;

    /**
     * The size in bytes of the blob.
     *
     * @var int
     */
    protected $size;

    /**
     * The media type of the object this schema refers to.
     */
    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    /**
     * The media type of the object this schema refers to.
     */
    public function setMediaType(string $mediaType): self
    {
        $this->initialized['mediaType'] = true;
        $this->mediaType = $mediaType;

        return $this;
    }

    /**
     * The digest of the targeted content.
     */
    public function getDigest(): string
    {
        return $this->digest;
    }

    /**
     * The digest of the targeted content.
     */
    public function setDigest(string $digest): self
    {
        $this->initialized['digest'] = true;
        $this->digest = $digest;

        return $this;
    }

    /**
     * The size in bytes of the blob.
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * The size in bytes of the blob.
     */
    public function setSize(int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }
}
