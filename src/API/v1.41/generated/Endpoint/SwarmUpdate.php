<?php

namespace Mdshack\Docker\API\v1_41\Endpoint;

class SwarmUpdate extends \Mdshack\Docker\API\v1_41\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_41\Runtime\Client\Endpoint
{
    protected $accept;

    /**
     * @param  array  $queryParameters {
     *
     *     @var int $version The version number of the swarm object being updated. This is
     *     @var bool $rotateWorkerToken Rotate the worker join token.
     *     @var bool $rotateManagerToken Rotate the manager join token.
     *     @var bool $rotateManagerUnlockKey Rotate the manager unlock key.
     * }
     *
     * @param  array  $accept Accept content header application/json|text/plain
     */
    public function __construct(\Mdshack\Docker\API\v1_41\Model\SwarmSpec $requestBody, array $queryParameters = [], array $accept = [])
    {
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }

    use \Mdshack\Docker\API\v1_41\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/swarm/update';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Mdshack\Docker\API\v1_41\Model\SwarmSpec) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }
        if ($this->body instanceof \Mdshack\Docker\API\v1_41\Model\SwarmSpec) {
            return [['Content-Type' => ['text/plain']], $this->body];
        }

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
        $optionsResolver->setDefined(['version', 'rotateWorkerToken', 'rotateManagerToken', 'rotateManagerUnlockKey']);
        $optionsResolver->setRequired(['version']);
        $optionsResolver->setDefaults(['rotateWorkerToken' => false, 'rotateManagerToken' => false, 'rotateManagerUnlockKey' => false]);
        $optionsResolver->addAllowedTypes('version', ['int']);
        $optionsResolver->addAllowedTypes('rotateWorkerToken', ['bool']);
        $optionsResolver->addAllowedTypes('rotateManagerToken', ['bool']);
        $optionsResolver->addAllowedTypes('rotateManagerUnlockKey', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return null
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmUpdateBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmUpdateInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmUpdateServiceUnavailableException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 200) {
        }
        if (is_null($contentType) === false && ($status === 400 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\SwarmUpdateBadRequestException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\SwarmUpdateInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 503 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\SwarmUpdateServiceUnavailableException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
