<?php

namespace Mdshack\Docker\API\v1_43\Endpoint;

class BuildPrune extends \Mdshack\Docker\API\v1_43\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_43\Runtime\Client\Endpoint
{
    /**
     * @param  array  $queryParameters {
     *
     *     @var int $keep-storage Amount of disk space in bytes to keep for cache
     *     @var bool $all Remove all types of build cache
     *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
    process on the list of build cache objects.

    Available filters:

    - `until=<timestamp>` remove cache older than `<timestamp>`. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon's local time.
    - `id=<id>`
    - `parent=<id>`
    - `type=<string>`
    - `description=<string>`
    - `inuse`
    - `shared`
    - `private`

     * }
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    use \Mdshack\Docker\API\v1_43\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/build/prune';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['keep-storage', 'all', 'filters']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('keep-storage', ['int']);
        $optionsResolver->addAllowedTypes('all', ['bool']);
        $optionsResolver->addAllowedTypes('filters', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return null|\Mdshack\Docker\API\v1_43\Model\BuildPrunePostResponse200
     *
     * @throws \Mdshack\Docker\API\v1_43\Exception\BuildPruneInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && ($status === 200 && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_43\\Model\\BuildPrunePostResponse200', 'json');
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_43\Exception\BuildPruneInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_43\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
