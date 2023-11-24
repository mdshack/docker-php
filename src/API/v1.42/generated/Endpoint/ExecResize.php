<?php

namespace Mdshack\Docker\API\v1_42\Endpoint;

class ExecResize extends \Mdshack\Docker\API\v1_42\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_42\Runtime\Client\Endpoint
{
    protected $id;
    protected $accept;
    /**
    * Resize the TTY session used by an exec instance. This endpoint only works
    if `tty` was specified as part of creating and starting the exec instance.
    
    *
    * @param string $id Exec instance ID
    * @param array $queryParameters {
    *     @var int $h Height of the TTY session in characters
    *     @var int $w Width of the TTY session in characters
    * }
    * @param array $accept Accept content header application/json|text/plain
    */
    public function __construct(string $id, array $queryParameters = array(), array $accept = array())
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }
    use \Mdshack\Docker\API\v1_42\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/exec/{id}/resize');
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
        $optionsResolver->setDefined(array('h', 'w'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('h', array('int'));
        $optionsResolver->addAllowedTypes('w', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Mdshack\Docker\API\v1_42\Exception\ExecResizeBadRequestException
     * @throws \Mdshack\Docker\API\v1_42\Exception\ExecResizeNotFoundException
     * @throws \Mdshack\Docker\API\v1_42\Exception\ExecResizeInternalServerErrorException
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
            throw new \Mdshack\Docker\API\v1_42\Exception\ExecResizeBadRequestException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\ExecResizeNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\ExecResizeInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}