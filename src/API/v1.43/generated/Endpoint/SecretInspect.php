<?php

namespace Mdshack\Docker\API\_____\Endpoint;

class SecretInspect extends \Mdshack\Docker\API\_____\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\_____\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * 
     *
     * @param string $id ID of the secret
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
    use \Mdshack\Docker\API\_____\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/secrets/{id}');
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
     * @throws \Mdshack\Docker\API\_____\Exception\SecretInspectNotFoundException
     * @throws \Mdshack\Docker\API\_____\Exception\SecretInspectInternalServerErrorException
     * @throws \Mdshack\Docker\API\_____\Exception\SecretInspectServiceUnavailableException
     *
     * @return null|\Mdshack\Docker\API\_____\Model\Secret
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API\\_____\\Model\\Secret', 'json');
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\_____\Exception\SecretInspectNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\_____\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\_____\Exception\SecretInspectInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\_____\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (503 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\_____\Exception\SecretInspectServiceUnavailableException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\_____\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}