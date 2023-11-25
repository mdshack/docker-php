<?php

namespace Mdshack\Docker\API\v1_40\Endpoint;

class Session extends \Mdshack\Docker\API\v1_40\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_40\Runtime\Client\Endpoint
{
    use \Mdshack\Docker\API\v1_40\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/session';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/vnd.docker.raw-stream']];
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
        if ($status === 101) {
        }
        if ($status === 400) {
        }
        if ($status === 500) {
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
