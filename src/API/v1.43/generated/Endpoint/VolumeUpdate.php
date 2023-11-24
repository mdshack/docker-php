<?php

namespace Mdshack\Docker\API$NAMESPACE\Endpoint;

class VolumeUpdate extends \Mdshack\Docker\API$NAMESPACE\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API$NAMESPACE\Runtime\Client\Endpoint
{
    protected $name;
    /**
    * 
    *
    * @param string $name The name or ID of the volume
    * @param null|\Mdshack\Docker\API$NAMESPACE\Model\VolumesNamePutBody $requestBody 
    * @param array $queryParameters {
    *     @var int $version The version number of the volume being updated. This is required to
    avoid conflicting writes. Found in the volume's `ClusterVolume`
    field.
    
    * }
    */
    public function __construct(string $name, ?\Mdshack\Docker\API$NAMESPACE\Model\VolumesNamePutBody $requestBody = null, array $queryParameters = array())
    {
        $this->name = $name;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    use \Mdshack\Docker\API$NAMESPACE\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'PUT';
    }
    public function getUri() : string
    {
        return str_replace(array('{name}'), array($this->name), '/volumes/{name}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if ($this->body instanceof \Mdshack\Docker\API$NAMESPACE\Model\VolumesNamePutBody) {
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
        $optionsResolver->setDefined(array('version'));
        $optionsResolver->setRequired(array('version'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('version', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\VolumeUpdateBadRequestException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\VolumeUpdateNotFoundException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\VolumeUpdateInternalServerErrorException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\VolumeUpdateServiceUnavailableException
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
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\VolumeUpdateBadRequestException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\VolumeUpdateNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\VolumeUpdateInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (503 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\VolumeUpdateServiceUnavailableException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}