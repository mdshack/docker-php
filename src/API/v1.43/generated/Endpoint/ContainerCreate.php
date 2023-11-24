<?php

namespace Mdshack\Docker\API$NAMESPACE\Endpoint;

class ContainerCreate extends \Mdshack\Docker\API$NAMESPACE\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API$NAMESPACE\Runtime\Client\Endpoint
{
    /**
    * 
    *
    * @param \Mdshack\Docker\API$NAMESPACE\Model\ContainersCreatePostBody $requestBody 
    * @param array $queryParameters {
    *     @var string $name Assign the specified name to the container. Must match
    `/?[a-zA-Z0-9][a-zA-Z0-9_.-]+`.
    
    *     @var string $platform Platform in the format `os[/arch[/variant]]` used for image lookup.
    
    When specified, the daemon checks if the requested image is present
    in the local image cache with the given OS and Architecture, and
    otherwise returns a `404` status.
    
    If the option is not set, the host's native OS and Architecture are
    used to look up the image in the image cache. However, if no platform
    is passed and the given image does exist in the local image cache,
    but its OS or architecture does not match, the container is created
    with the available image, and a warning is added to the `Warnings`
    field in the response, for example;
    
       WARNING: The requested image's platform (linux/arm64/v8) does not
                match the detected host platform (linux/amd64) and no
                specific platform was requested
    
    * }
    */
    public function __construct(\Mdshack\Docker\API$NAMESPACE\Model\ContainersCreatePostBody $requestBody, array $queryParameters = array())
    {
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    use \Mdshack\Docker\API$NAMESPACE\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/containers/create';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if ($this->body instanceof \Mdshack\Docker\API$NAMESPACE\Model\ContainersCreatePostBody) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        if ($this->body instanceof \Mdshack\Docker\API$NAMESPACE\Model\ContainersCreatePostBody) {
            return array(array('Content-Type' => array('application/octet-stream')), $this->body);
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
        $optionsResolver->setDefined(array('name', 'platform'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('name', array('string'));
        $optionsResolver->addAllowedTypes('platform', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ContainerCreateBadRequestException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ContainerCreateNotFoundException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ContainerCreateConflictException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ContainerCreateInternalServerErrorException
     *
     * @return null|\Mdshack\Docker\API$NAMESPACE\Model\ContainerCreateResponse
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ContainerCreateResponse', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ContainerCreateBadRequestException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ContainerCreateNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (409 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ContainerCreateConflictException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ContainerCreateInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}