<?php

namespace Mdshack\Docker\API\v1_41\Endpoint;

class SwarmInspect extends \Mdshack\Docker\API\v1_41\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_41\Runtime\Client\Endpoint
{
    protected $accept;

    /**
     * @param  array  $accept Accept content header application/json|text/plain
     */
    public function __construct(array $accept = [])
    {
        $this->accept = $accept;
    }

    use \Mdshack\Docker\API\v1_41\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/swarm';
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

    /**
     * {@inheritdoc}
     *
     * @return null|\Mdshack\Docker\API\v1_41\Model\Swarm
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmInspectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmInspectInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmInspectServiceUnavailableException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && ($status === 200 && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\Swarm', 'json');
        }
        if (is_null($contentType) === false && ($status === 404 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\SwarmInspectNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\SwarmInspectInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 503 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\SwarmInspectServiceUnavailableException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
