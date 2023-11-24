<?php

namespace Mdshack\Docker\API\v1_42\Endpoint;

class SystemAuth extends \Mdshack\Docker\API\v1_42\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_42\Runtime\Client\Endpoint
{
    /**
    * Validate credentials for a registry and, if available, get an identity
    token for accessing the registry without password.
    
    *
    * @param null|\Mdshack\Docker\API\v1_42\Model\AuthConfig $requestBody 
    */
    public function __construct(?\Mdshack\Docker\API\v1_42\Model\AuthConfig $requestBody = null)
    {
        $this->body = $requestBody;
    }
    use \Mdshack\Docker\API\v1_42\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/auth';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if ($this->body instanceof \Mdshack\Docker\API\v1_42\Model\AuthConfig) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Mdshack\Docker\API\v1_42\Exception\SystemAuthUnauthorizedException
     * @throws \Mdshack\Docker\API\v1_42\Exception\SystemAuthInternalServerErrorException
     *
     * @return null|\Mdshack\Docker\API\v1_42\Model\AuthPostResponse200
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\AuthPostResponse200', 'json');
        }
        if (204 === $status) {
        }
        if (is_null($contentType) === false && (401 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\SystemAuthUnauthorizedException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\SystemAuthInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}