<?php

namespace Mdshack\Docker\API$NAMESPACE\Endpoint;

class ServiceUpdate extends \Mdshack\Docker\API$NAMESPACE\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API$NAMESPACE\Runtime\Client\Endpoint
{
    protected $id;
    /**
    * 
    *
    * @param string $id ID or name of service.
    * @param \Mdshack\Docker\API$NAMESPACE\Model\ServicesIdUpdatePostBody $requestBody 
    * @param array $queryParameters {
    *     @var int $version The version number of the service object being updated. This is
    required to avoid conflicting writes.
    This version number should be the value as currently set on the
    service *before* the update. You can find the current version by
    calling `GET /services/{id}`
    
    *     @var string $registryAuthFrom If the `X-Registry-Auth` header is not specified, this parameter
    indicates where to find registry authorization credentials.
    
    *     @var string $rollback Set to this parameter to `previous` to cause a server-side rollback
    to the previous service spec. The supplied spec will be ignored in
    this case.
    
    * }
    * @param array $headerParameters {
    *     @var string $X-Registry-Auth A base64url-encoded auth configuration for pulling from private
    registries.
    
    Refer to the [authentication section](#section/Authentication) for
    details.
    
    * }
    */
    public function __construct(string $id, \Mdshack\Docker\API$NAMESPACE\Model\ServicesIdUpdatePostBody $requestBody, array $queryParameters = array(), array $headerParameters = array())
    {
        $this->id = $id;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
        $this->headerParameters = $headerParameters;
    }
    use \Mdshack\Docker\API$NAMESPACE\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/services/{id}/update');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if ($this->body instanceof \Mdshack\Docker\API$NAMESPACE\Model\ServicesIdUpdatePostBody) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('version', 'registryAuthFrom', 'rollback'));
        $optionsResolver->setRequired(array('version'));
        $optionsResolver->setDefaults(array('registryAuthFrom' => 'spec'));
        $optionsResolver->addAllowedTypes('version', array('int'));
        $optionsResolver->addAllowedTypes('registryAuthFrom', array('string'));
        $optionsResolver->addAllowedTypes('rollback', array('string'));
        return $optionsResolver;
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
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ServiceUpdateBadRequestException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ServiceUpdateNotFoundException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ServiceUpdateInternalServerErrorException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ServiceUpdateServiceUnavailableException
     *
     * @return null|\Mdshack\Docker\API$NAMESPACE\Model\ServiceUpdateResponse
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ServiceUpdateResponse', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ServiceUpdateBadRequestException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ServiceUpdateNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ServiceUpdateInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (503 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ServiceUpdateServiceUnavailableException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}