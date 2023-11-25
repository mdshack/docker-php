<?php

namespace Mdshack\Docker\API\v1_40\Endpoint;

class ImageGet extends \Mdshack\Docker\API\v1_40\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_40\Runtime\Client\Endpoint
{
    protected $name;

    /**
     * Get a tarball containing all images and metadata for a repository.

    If `name` is a specific name and tag (e.g. `ubuntu:latest`), then only that image (and its parents) are returned. If `name` is an image ID, similarly only that image (and its parents) are returned, but with the exclusion of the `repositories` file in the tarball, as there were no image names referenced.

    ### Image tarball format

    An image tarball contains one directory per image layer (named using its long ID), each containing these files:

    - `VERSION`: currently `1.0` - the file format version
    - `json`: detailed layer information, similar to `docker inspect layer_id`
    - `layer.tar`: A tarfile containing the filesystem changes in this layer

    The `layer.tar` file contains `aufs` style `.wh..wh.aufs` files and directories for storing attribute changes and deletions.

    If the tarball defines a repository, the tarball should also include a `repositories` file at the root that contains a list of repository and tag names mapped to layer IDs.

    ```json
    {
     "hello-world": {
       "latest": "565a9d68a73f6706862bfe8409a7f659776d4d60a8d096eb4a3cbce6999cc2a1"
     }
    }
    ```

     *
     * @param  string  $name Image name or ID
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    use \Mdshack\Docker\API\v1_40\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{name}'], [$this->name], '/images/{name}/get');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/x-tar']];
    }

    /**
     * {@inheritdoc}
     *
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 200) {
        }
        if ($status === 500) {
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
