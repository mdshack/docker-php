<?php

namespace Mdshack\Docker\API\v1_43\Endpoint;

class ImageGetAll extends \Mdshack\Docker\API\v1_43\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_43\Runtime\Client\Endpoint
{
    /**
     * Get a tarball containing all images and metadata for several image
    repositories.

    For each value of the `names` parameter: if it is a specific name and
    tag (e.g. `ubuntu:latest`), then only that image (and its parents) are
    returned; if it is an image ID, similarly only that image (and its parents)
    are returned and there would be no names referenced in the 'repositories'
    file for this image ID.

    For details on the format, see the [export image endpoint](#operation/ImageGet).

     *
     * @param  array  $queryParameters {
     *
     *     @var array $names Image names to filter by
     * }
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    use \Mdshack\Docker\API\v1_43\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/images/get';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/x-tar']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['names']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('names', ['array']);

        return $optionsResolver;
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