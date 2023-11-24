<?php

namespace Mdshack\Docker\API\v1_43\Endpoint;

class DistributionInspect extends \Mdshack\Docker\API\v1_43\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_43\Runtime\Client\Endpoint
{
    protected $name;

    /**
     * Return image digest and platform information by contacting the registry.
     *
     * @param  string  $name Image name or id
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    use \Mdshack\Docker\API\v1_43\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{name}'], [$this->name], '/distribution/{name}/json');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * {@inheritdoc}
     *
     * @return null|\Mdshack\Docker\API\v1_43\Model\DistributionInspect
     *
     * @throws \Mdshack\Docker\API\v1_43\Exception\DistributionInspectUnauthorizedException
     * @throws \Mdshack\Docker\API\v1_43\Exception\DistributionInspectInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && ($status === 200 && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_43\\Model\\DistributionInspect', 'json');
        }
        if (is_null($contentType) === false && ($status === 401 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_43\Exception\DistributionInspectUnauthorizedException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_43\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_43\Exception\DistributionInspectInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_43\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
