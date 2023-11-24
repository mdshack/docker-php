<?php

namespace Mdshack\Docker\API\v1_42\Endpoint;

class SecretCreate extends \Mdshack\Docker\API\v1_42\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_42\Runtime\Client\Endpoint
{
    /**
     * 
     *
     * @param null|\Mdshack\Docker\API\v1_42\Model\SecretsCreatePostBody $requestBody 
     */
    public function __construct(?\Mdshack\Docker\API\v1_42\Model\SecretsCreatePostBody $requestBody = null)
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
        return '/secrets/create';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if ($this->body instanceof \Mdshack\Docker\API\v1_42\Model\SecretsCreatePostBody) {
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
     * @throws \Mdshack\Docker\API\v1_42\Exception\SecretCreateConflictException
     * @throws \Mdshack\Docker\API\v1_42\Exception\SecretCreateInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_42\Exception\SecretCreateServiceUnavailableException
     *
     * @return null|\Mdshack\Docker\API\v1_42\Model\IdResponse
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\IdResponse', 'json');
        }
        if (is_null($contentType) === false && (409 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\SecretCreateConflictException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\SecretCreateInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (503 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\SecretCreateServiceUnavailableException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}