<?php

namespace Mdshack\Docker\API\v1_42\Endpoint;

class ContainerStop extends \Mdshack\Docker\API\v1_42\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_42\Runtime\Client\Endpoint
{
    protected $id;
    protected $accept;
    /**
     * 
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     *     @var string $signal Signal to send to the container as an integer or string (e.g. `SIGINT`).
     *     @var int $t Number of seconds to wait before killing the container
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
        return str_replace(array('{id}'), array($this->id), '/containers/{id}/stop');
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
        $optionsResolver->setDefined(array('signal', 't'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('signal', array('string'));
        $optionsResolver->addAllowedTypes('t', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Mdshack\Docker\API\v1_42\Exception\ContainerStopNotFoundException
     * @throws \Mdshack\Docker\API\v1_42\Exception\ContainerStopInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
        }
        if (304 === $status) {
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\ContainerStopNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\ContainerStopInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}