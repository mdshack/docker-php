<?php

namespace Mdshack\Docker\API\v1_41\Endpoint;

class TaskLogs extends \Mdshack\Docker\API\v1_41\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_41\Runtime\Client\Endpoint
{
    protected $id;
    protected $accept;
    /**
    * Get `stdout` and `stderr` logs from a task.
    See also [`/containers/{id}/logs`](#operation/ContainerLogs).
    
    **Note**: This endpoint works only for services with the `local`,
    `json-file` or `journald` logging drivers.
    
    *
    * @param string $id ID of the task
    * @param array $queryParameters {
    *     @var bool $details Show task context and extra details provided to logs.
    *     @var bool $follow Keep connection after returning logs.
    *     @var bool $stdout Return logs from `stdout`
    *     @var bool $stderr Return logs from `stderr`
    *     @var int $since Only return logs since this time, as a UNIX timestamp
    *     @var bool $timestamps Add timestamps to every log line
    *     @var string $tail Only return this number of log lines from the end of the logs.
    Specify as an integer or `all` to output all log lines.
    
    * }
    * @param array $accept Accept content header application/json|text/plain
    */
    public function __construct(string $id, array $queryParameters = array(), array $accept = array())
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }
    use \Mdshack\Docker\API\v1_41\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/tasks/{id}/logs');
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
        $optionsResolver->setDefined(array('details', 'follow', 'stdout', 'stderr', 'since', 'timestamps', 'tail'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('details' => false, 'follow' => false, 'stdout' => false, 'stderr' => false, 'since' => 0, 'timestamps' => false, 'tail' => 'all'));
        $optionsResolver->addAllowedTypes('details', array('bool'));
        $optionsResolver->addAllowedTypes('follow', array('bool'));
        $optionsResolver->addAllowedTypes('stdout', array('bool'));
        $optionsResolver->addAllowedTypes('stderr', array('bool'));
        $optionsResolver->addAllowedTypes('since', array('int'));
        $optionsResolver->addAllowedTypes('timestamps', array('bool'));
        $optionsResolver->addAllowedTypes('tail', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\TaskLogsNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\TaskLogsInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\TaskLogsServiceUnavailableException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\TaskLogsNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\TaskLogsInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (503 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\TaskLogsServiceUnavailableException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}