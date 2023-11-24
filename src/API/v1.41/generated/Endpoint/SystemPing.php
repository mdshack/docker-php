<?php

namespace Mdshack\Docker\API\v1_41\Endpoint;

class SystemPing extends \Mdshack\Docker\API\v1_41\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_41\Runtime\Client\Endpoint
{
    use \Mdshack\Docker\API\v1_41\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/_ping';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['text/plain']];
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
