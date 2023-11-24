<?php

namespace Mdshack\Docker\API\v1_42\Endpoint;

class ImageInspect extends \Mdshack\Docker\API\v1_42\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_42\Runtime\Client\Endpoint
{
    protected $name;
    /**
     * Return low-level information about an image.
     *
     * @param string $name Image name or id
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    use \Mdshack\Docker\API\v1_42\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{name}'), array($this->name), '/images/{name}/json');
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
     * @throws \Mdshack\Docker\API\v1_42\Exception\ImageInspectNotFoundException
     * @throws \Mdshack\Docker\API\v1_42\Exception\ImageInspectInternalServerErrorException
     *
     * @return null|\Mdshack\Docker\API\v1_42\Model\ImageInspect
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ImageInspect', 'json');
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\ImageInspectNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\ImageInspectInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}