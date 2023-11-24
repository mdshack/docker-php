<?php

namespace Mdshack\Docker\API\v1_42\Endpoint;

class ConfigDelete extends \Mdshack\Docker\API\v1_42\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_42\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * 
     *
     * @param string $id ID of the config
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
    use \Mdshack\Docker\API\v1_42\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'DELETE';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/configs/{id}');
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
     * @throws \Mdshack\Docker\API\v1_42\Exception\ConfigDeleteNotFoundException
     * @throws \Mdshack\Docker\API\v1_42\Exception\ConfigDeleteInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_42\Exception\ConfigDeleteServiceUnavailableException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\ConfigDeleteNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\ConfigDeleteInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (503 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\ConfigDeleteServiceUnavailableException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}