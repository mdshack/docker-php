<?php

namespace Mdshack\Docker\API\_____\Endpoint;

class NetworkInspect extends \Mdshack\Docker\API\_____\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\_____\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * 
     *
     * @param string $id Network ID or name
     * @param array $queryParameters {
     *     @var bool $verbose Detailed inspect output for troubleshooting
     *     @var string $scope Filter the network by scope (swarm, global, or local)
     * }
     */
    public function __construct(string $id, array $queryParameters = array())
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }
    use \Mdshack\Docker\API\_____\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/networks/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('verbose', 'scope'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('verbose' => false));
        $optionsResolver->addAllowedTypes('verbose', array('bool'));
        $optionsResolver->addAllowedTypes('scope', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Mdshack\Docker\API\_____\Exception\NetworkInspectNotFoundException
     * @throws \Mdshack\Docker\API\_____\Exception\NetworkInspectInternalServerErrorException
     *
     * @return null|\Mdshack\Docker\API\_____\Model\Network
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API\\_____\\Model\\Network', 'json');
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\_____\Exception\NetworkInspectNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\_____\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\_____\Exception\NetworkInspectInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\_____\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}