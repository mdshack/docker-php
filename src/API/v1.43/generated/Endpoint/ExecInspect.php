<?php

namespace Mdshack\Docker\API\_____\Endpoint;

class ExecInspect extends \Mdshack\Docker\API\_____\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\_____\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * Return low-level information about an exec instance.
     *
     * @param string $id Exec instance ID
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
        return str_replace(array('{id}'), array($this->id), '/exec/{id}/json');
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
     * @throws \Mdshack\Docker\API\_____\Exception\ExecInspectNotFoundException
     * @throws \Mdshack\Docker\API\_____\Exception\ExecInspectInternalServerErrorException
     *
     * @return null|\Mdshack\Docker\API\_____\Model\ExecIdJsonGetResponse200
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API\\_____\\Model\\ExecIdJsonGetResponse200', 'json');
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\_____\Exception\ExecInspectNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\_____\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\_____\Exception\ExecInspectInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\_____\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}