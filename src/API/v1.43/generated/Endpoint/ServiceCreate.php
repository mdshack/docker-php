<?php

namespace Mdshack\Docker\API$NAMESPACE\Endpoint;

class ServiceCreate extends \Mdshack\Docker\API$NAMESPACE\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API$NAMESPACE\Runtime\Client\Endpoint
{
    /**
    * 
    *
    * @param \Mdshack\Docker\API$NAMESPACE\Model\ServicesCreatePostBody $requestBody 
    * @param array $headerParameters {
    *     @var string $X-Registry-Auth A base64url-encoded auth configuration for pulling from private
    registries.
    
    Refer to the [authentication section](#section/Authentication) for
    details.
    
    * }
    */
    public function __construct(\Mdshack\Docker\API$NAMESPACE\Model\ServicesCreatePostBody $requestBody, array $headerParameters = array())
    {
        $this->body = $requestBody;
        $this->headerParameters = $headerParameters;
    }
    use \Mdshack\Docker\API$NAMESPACE\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/services/create';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if ($this->body instanceof \Mdshack\Docker\API$NAMESPACE\Model\ServicesCreatePostBody) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getHeadersOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(array('X-Registry-Auth'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('X-Registry-Auth', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ServiceCreateBadRequestException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ServiceCreateForbiddenException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ServiceCreateConflictException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ServiceCreateInternalServerErrorException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ServiceCreateServiceUnavailableException
     *
     * @return null|\Mdshack\Docker\API$NAMESPACE\Model\ServicesCreatePostResponse201
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ServicesCreatePostResponse201', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ServiceCreateBadRequestException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (403 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ServiceCreateForbiddenException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (409 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ServiceCreateConflictException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ServiceCreateInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (503 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ServiceCreateServiceUnavailableException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}