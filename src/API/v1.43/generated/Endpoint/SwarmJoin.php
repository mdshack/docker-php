<?php

namespace Mdshack\Docker\API${NAMESPACE}\Endpoint;

class SwarmJoin extends \Mdshack\Docker\API${NAMESPACE}\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API${NAMESPACE}\Runtime\Client\Endpoint
{
    protected $accept;
    /**
     * 
     *
     * @param \Mdshack\Docker\API${NAMESPACE}\Model\SwarmJoinPostBody $requestBody 
     * @param array $accept Accept content header application/json|text/plain
     */
    public function __construct(\Mdshack\Docker\API${NAMESPACE}\Model\SwarmJoinPostBody $requestBody, array $accept = array())
    {
        $this->body = $requestBody;
        $this->accept = $accept;
    }
    use \Mdshack\Docker\API${NAMESPACE}\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/swarm/join';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if ($this->body instanceof \Mdshack\Docker\API${NAMESPACE}\Model\SwarmJoinPostBody) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        if ($this->body instanceof \Mdshack\Docker\API${NAMESPACE}\Model\SwarmJoinPostBody) {
            return array(array('Content-Type' => array('text/plain')), $this->body);
        }
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        if (empty($this->accept)) {
            return array('Accept' => array('application/json', 'text/plain'));
        }
        return $this->accept;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Mdshack\Docker\API${NAMESPACE}\Exception\SwarmJoinBadRequestException
     * @throws \Mdshack\Docker\API${NAMESPACE}\Exception\SwarmJoinInternalServerErrorException
     * @throws \Mdshack\Docker\API${NAMESPACE}\Exception\SwarmJoinServiceUnavailableException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API${NAMESPACE}\Exception\SwarmJoinBadRequestException($serializer->deserialize($body, 'Mdshack\\Docker\\API${NAMESPACE}\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API${NAMESPACE}\Exception\SwarmJoinInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API${NAMESPACE}\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (503 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API${NAMESPACE}\Exception\SwarmJoinServiceUnavailableException($serializer->deserialize($body, 'Mdshack\\Docker\\API${NAMESPACE}\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}