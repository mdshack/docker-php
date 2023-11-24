<?php

namespace Mdshack\Docker\API\v1_43\Model;

class SystemDfGetJsonResponse200 extends \ArrayObject
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
    protected $layersSize;

    /**
     * @var ImageSummary[]
     */
    protected $images;

    /**
     * @var ContainerSummary[]
     */
    protected $containers;

    /**
     * @var Volume[]
     */
    protected $volumes;

    /**
     * @var BuildCache[]
     */
    protected $buildCache;

    public function getLayersSize(): int
    {
        return $this->layersSize;
    }

    public function setLayersSize(int $layersSize): self
    {
        $this->initialized['layersSize'] = true;
        $this->layersSize = $layersSize;

        return $this;
    }

    /**
     * @return ImageSummary[]
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param  ImageSummary[]  $images
     */
    public function setImages(array $images): self
    {
        $this->initialized['images'] = true;
        $this->images = $images;

        return $this;
    }

    /**
     * @return ContainerSummary[]
     */
    public function getContainers(): array
    {
        return $this->containers;
    }

    /**
     * @param  ContainerSummary[]  $containers
     */
    public function setContainers(array $containers): self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;

        return $this;
    }

    /**
     * @return Volume[]
     */
    public function getVolumes(): array
    {
        return $this->volumes;
    }

    /**
     * @param  Volume[]  $volumes
     */
    public function setVolumes(array $volumes): self
    {
        $this->initialized['volumes'] = true;
        $this->volumes = $volumes;

        return $this;
    }

    /**
     * @return BuildCache[]
     */
    public function getBuildCache(): array
    {
        return $this->buildCache;
    }

    /**
     * @param  BuildCache[]  $buildCache
     */
    public function setBuildCache(array $buildCache): self
    {
        $this->initialized['buildCache'] = true;
        $this->buildCache = $buildCache;

        return $this;
    }
}
