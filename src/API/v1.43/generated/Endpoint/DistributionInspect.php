<?php

namespace Mdshack\Docker\API${NAMESPACE}\Endpoint;

class DistributionInspect extends \Mdshack\Docker\API${NAMESPACE}\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API${NAMESPACE}\Runtime\Client\Endpoint
{
    protected $name;
    /**
     * Return image digest and platform information by contacting the registry.
     *
     * @param string $name Image name or id
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    use \Mdshack\Docker\API${NAMESPACE}\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{name}'), array($this->name), '/distribution/{name}/json');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Mdshack\Docker\API${NAMESPACE}\Exception\DistributionInspectUnauthorizedException
     * @throws \Mdshack\Docker\API${NAMESPACE}\Exception\DistributionInspectInternalServerErrorException
     *
     * @return null|\Mdshack\Docker\API${NAMESPACE}\Model\DistributionInspect
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API${NAMESPACE}\\Model\\DistributionInspect', 'json');
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API${NAMESPACE}\Exception\DistributionInspectUnauthorizedException($serializer->deserialize($body, 'Mdshack\\Docker\\API${NAMESPACE}\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API${NAMESPACE}\Exception\DistributionInspectInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API${NAMESPACE}\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}