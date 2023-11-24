<?php

namespace Mdshack\Docker\API\v1_41\Endpoint;

class VolumeDelete extends \Mdshack\Docker\API\v1_41\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_41\Runtime\Client\Endpoint
{
    protected $name;

    protected $accept;

    /**
     * Instruct the driver to remove the volume.
     *
     * @param  string  $name Volume name or ID
     * @param  array  $queryParameters {
     *
     *     @var bool $force Force the removal of the volume
     * }
     *
     * @param  array  $accept Accept content header application/json|text/plain
     */
    public function __construct(string $name, array $queryParameters = [], array $accept = [])
    {
        $this->name = $name;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }

    use \Mdshack\Docker\API\v1_41\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{name}'], [$this->name], '/volumes/{name}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/json', 'text/plain']];
        }

        return $this->accept;
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['force']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['force' => false]);
        $optionsResolver->addAllowedTypes('force', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return null
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\VolumeDeleteNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\VolumeDeleteConflictException
     * @throws \Mdshack\Docker\API\v1_41\Exception\VolumeDeleteInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 204) {
        }
        if (is_null($contentType) === false && ($status === 404 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\VolumeDeleteNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 409 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\VolumeDeleteConflictException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\VolumeDeleteInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
