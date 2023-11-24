<?php

namespace Mdshack\Docker\API\v1_43\Endpoint;

class VolumeCreate extends \Mdshack\Docker\API\v1_43\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_43\Runtime\Client\Endpoint
{
    public function __construct(\Mdshack\Docker\API\v1_43\Model\VolumeCreateOptions $requestBody)
    {
        $this->body = $requestBody;
    }

    use \Mdshack\Docker\API\v1_43\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/volumes/create';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Mdshack\Docker\API\v1_43\Model\VolumeCreateOptions) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * {@inheritdoc}
     *
     * @return null|\Mdshack\Docker\API\v1_43\Model\Volume
     *
     * @throws \Mdshack\Docker\API\v1_43\Exception\VolumeCreateInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && ($status === 201 && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_43\\Model\\Volume', 'json');
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_43\Exception\VolumeCreateInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_43\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
