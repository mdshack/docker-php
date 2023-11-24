<?php

namespace Mdshack\Docker\API\v1_41\Model;

class ImageSummary extends \ArrayObject
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
     * ID is the content-addressable ID of an image.

    This identifier is a content-addressable digest calculated from the
    image's configuration (which includes the digests of layers used by
    the image).

    Note that this digest differs from the `RepoDigests` below, which
    holds digests of image manifests that reference the image.

     *
     * @var string
     */
    protected $id;

    /**
     * ID of the parent image.

    Depending on how the image was created, this field may be empty and
    is only set for images that were built/created locally. This field
    is empty if the image was pulled from an image registry.

     *
     * @var string
     */
    protected $parentId;

    /**
     * List of image names/tags in the local image cache that reference this
    image.

    Multiple image tags can refer to the same image, and this list may be
    empty if no tags reference the image, in which case the image is
    "untagged", in which case it can still be referenced by its ID.

     *
     * @var string[]
     */
    protected $repoTags;

    /**
     * List of content-addressable digests of locally available image manifests
    that the image is referenced from. Multiple manifests can refer to the
    same image.

    These digests are usually only available if the image was either pulled
    from a registry, or if the image was pushed to a registry, which is when
    the manifest is generated and its digest calculated.

     *
     * @var string[]
     */
    protected $repoDigests;

    /**
     * Date and time at which the image was created as a Unix timestamp
    (number of seconds sinds EPOCH).

     *
     * @var int
     */
    protected $created;

    /**
     * Total size of the image including all layers it is composed of.
     *
     * @var int
     */
    protected $size;

    /**
     * Total size of image layers that are shared between this image and other
    images.

    This size is not calculated by default. `-1` indicates that the value
    has not been set / calculated.

     *
     * @var int
     */
    protected $sharedSize;

    /**
     * Total size of the image including all layers it is composed of.

    In versions of Docker before v1.10, this field was calculated from
    the image itself and all of its parent images. Docker v1.10 and up
    store images self-contained, and no longer use a parent-chain, making
    this field an equivalent of the Size field.

    This field is kept for backward compatibility, but may be removed in
    a future version of the API.

     *
     * @var int
     */
    protected $virtualSize;

    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>
     */
    protected $labels;

    /**
     * Number of containers using this image. Includes both stopped and running
    containers.

    This size is not calculated by default, and depends on which API endpoint
    is used. `-1` indicates that the value has not been set / calculated.

     *
     * @var int
     */
    protected $containers;

    /**
     * ID is the content-addressable ID of an image.

    This identifier is a content-addressable digest calculated from the
    image's configuration (which includes the digests of layers used by
    the image).

    Note that this digest differs from the `RepoDigests` below, which
    holds digests of image manifests that reference the image.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * ID is the content-addressable ID of an image.

    This identifier is a content-addressable digest calculated from the
    image's configuration (which includes the digests of layers used by
    the image).

    Note that this digest differs from the `RepoDigests` below, which
    holds digests of image manifests that reference the image.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * ID of the parent image.

    Depending on how the image was created, this field may be empty and
    is only set for images that were built/created locally. This field
    is empty if the image was pulled from an image registry.
     */
    public function getParentId(): string
    {
        return $this->parentId;
    }

    /**
     * ID of the parent image.

    Depending on how the image was created, this field may be empty and
    is only set for images that were built/created locally. This field
    is empty if the image was pulled from an image registry.
     */
    public function setParentId(string $parentId): self
    {
        $this->initialized['parentId'] = true;
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * List of image names/tags in the local image cache that reference this
    image.

    Multiple image tags can refer to the same image, and this list may be
    empty if no tags reference the image, in which case the image is
    "untagged", in which case it can still be referenced by its ID.

     *
     * @return string[]
     */
    public function getRepoTags(): array
    {
        return $this->repoTags;
    }

    /**
     * List of image names/tags in the local image cache that reference this
    image.

    Multiple image tags can refer to the same image, and this list may be
    empty if no tags reference the image, in which case the image is
    "untagged", in which case it can still be referenced by its ID.

     *
     * @param  string[]  $repoTags
     */
    public function setRepoTags(array $repoTags): self
    {
        $this->initialized['repoTags'] = true;
        $this->repoTags = $repoTags;

        return $this;
    }

    /**
     * List of content-addressable digests of locally available image manifests
    that the image is referenced from. Multiple manifests can refer to the
    same image.

    These digests are usually only available if the image was either pulled
    from a registry, or if the image was pushed to a registry, which is when
    the manifest is generated and its digest calculated.

     *
     * @return string[]
     */
    public function getRepoDigests(): array
    {
        return $this->repoDigests;
    }

    /**
     * List of content-addressable digests of locally available image manifests
    that the image is referenced from. Multiple manifests can refer to the
    same image.

    These digests are usually only available if the image was either pulled
    from a registry, or if the image was pushed to a registry, which is when
    the manifest is generated and its digest calculated.

     *
     * @param  string[]  $repoDigests
     */
    public function setRepoDigests(array $repoDigests): self
    {
        $this->initialized['repoDigests'] = true;
        $this->repoDigests = $repoDigests;

        return $this;
    }

    /**
     * Date and time at which the image was created as a Unix timestamp
    (number of seconds sinds EPOCH).
     */
    public function getCreated(): int
    {
        return $this->created;
    }

    /**
     * Date and time at which the image was created as a Unix timestamp
    (number of seconds sinds EPOCH).
     */
    public function setCreated(int $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    /**
     * Total size of the image including all layers it is composed of.
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * Total size of the image including all layers it is composed of.
     */
    public function setSize(int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * Total size of image layers that are shared between this image and other
    images.

    This size is not calculated by default. `-1` indicates that the value
    has not been set / calculated.
     */
    public function getSharedSize(): int
    {
        return $this->sharedSize;
    }

    /**
     * Total size of image layers that are shared between this image and other
    images.

    This size is not calculated by default. `-1` indicates that the value
    has not been set / calculated.
     */
    public function setSharedSize(int $sharedSize): self
    {
        $this->initialized['sharedSize'] = true;
        $this->sharedSize = $sharedSize;

        return $this;
    }

    /**
     * Total size of the image including all layers it is composed of.

    In versions of Docker before v1.10, this field was calculated from
    the image itself and all of its parent images. Docker v1.10 and up
    store images self-contained, and no longer use a parent-chain, making
    this field an equivalent of the Size field.

    This field is kept for backward compatibility, but may be removed in
    a future version of the API.
     */
    public function getVirtualSize(): int
    {
        return $this->virtualSize;
    }

    /**
     * Total size of the image including all layers it is composed of.

    In versions of Docker before v1.10, this field was calculated from
    the image itself and all of its parent images. Docker v1.10 and up
    store images self-contained, and no longer use a parent-chain, making
    this field an equivalent of the Size field.

    This field is kept for backward compatibility, but may be removed in
    a future version of the API.
     */
    public function setVirtualSize(int $virtualSize): self
    {
        $this->initialized['virtualSize'] = true;
        $this->virtualSize = $virtualSize;

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
     * Number of containers using this image. Includes both stopped and running
    containers.

    This size is not calculated by default, and depends on which API endpoint
    is used. `-1` indicates that the value has not been set / calculated.
     */
    public function getContainers(): int
    {
        return $this->containers;
    }

    /**
     * Number of containers using this image. Includes both stopped and running
    containers.

    This size is not calculated by default, and depends on which API endpoint
    is used. `-1` indicates that the value has not been set / calculated.
     */
    public function setContainers(int $containers): self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;

        return $this;
    }
}
