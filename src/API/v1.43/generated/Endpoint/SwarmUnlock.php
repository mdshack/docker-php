<?php

namespace Mdshack\Docker\API\v1_43\Endpoint;

class SwarmUnlock extends \Mdshack\Docker\API\v1_43\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_43\Runtime\Client\Endpoint
{
    /**
     * 
     *
     * @param \Mdshack\Docker\API\v1_43\Model\SwarmUnlockPostBody $requestBody 
     */
    public function __construct(\Mdshack\Docker\API\v1_43\Model\SwarmUnlockPostBody $requestBody)
    {
        $this->body = $requestBody;
    }
    use \Mdshack\Docker\API\v1_43\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/swarm/unlock';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if ($this->body instanceof \Mdshack\Docker\API\v1_43\Model\SwarmUnlockPostBody) {
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
     * @throws \Mdshack\Docker\API\v1_43\Exception\SwarmUnlockInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_43\Exception\SwarmUnlockServiceUnavailableException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_43\Exception\SwarmUnlockInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_43\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (503 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_43\Exception\SwarmUnlockServiceUnavailableException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_43\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}