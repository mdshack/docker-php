<?php

namespace Mdshack\Docker\API\v1_43\Endpoint;

class SystemPingHead extends \Mdshack\Docker\API\v1_43\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_43\Runtime\Client\Endpoint
{
    use \Mdshack\Docker\API\v1_43\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'HEAD';
    }
    public function getUri() : string
    {
        return '/_ping';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('text/plain'));
    }
    /**
     * {@inheritdoc}
     *
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
        }
        if (500 === $status) {
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}