<?php

namespace Mdshack\Docker\API$NAMESPACE\Endpoint;

class ContainerArchiveInfo extends \Mdshack\Docker\API$NAMESPACE\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API$NAMESPACE\Runtime\Client\Endpoint
{
    protected $id;
    protected $accept;
    /**
    * A response header `X-Docker-Container-Path-Stat` is returned, containing
    a base64 - encoded JSON object with some filesystem header information
    about the path.
    
    *
    * @param string $id ID or name of the container
    * @param array $queryParameters {
    *     @var string $path Resource in the container’s filesystem to archive.
    * }
    * @param array $accept Accept content header application/json|text/plain
    */
    public function __construct(string $id, array $queryParameters = array(), array $accept = array())
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }
    use \Mdshack\Docker\API$NAMESPACE\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'HEAD';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/containers/{id}/archive');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        if (empty($this->accept)) {
            return array('Accept' => array('application/json', 'text/plain'));
        }
        return $this->accept;
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('path'));
        $optionsResolver->setRequired(array('path'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('path', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ContainerArchiveInfoBadRequestException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ContainerArchiveInfoNotFoundException
     * @throws \Mdshack\Docker\API$NAMESPACE\Exception\ContainerArchiveInfoInternalServerErrorException
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
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ContainerArchiveInfoBadRequestException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ContainerArchiveInfoNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API$NAMESPACE\Exception\ContainerArchiveInfoInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API$NAMESPACE\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}