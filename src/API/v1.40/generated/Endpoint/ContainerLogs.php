<?php

namespace Mdshack\Docker\API\v1_40\Endpoint;

class ContainerLogs extends \Mdshack\Docker\API\v1_40\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_40\Runtime\Client\Endpoint
{
    protected $id;

    protected $accept;

    /**
     * Get `stdout` and `stderr` logs from a container.

    Note: This endpoint works only for containers with the `json-file` or
    `journald` logging driver.

     *
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var bool $follow Keep connection after returning logs.
     *     @var bool $stdout Return logs from `stdout`
     *     @var bool $stderr Return logs from `stderr`
     *     @var int $since Only return logs since this time, as a UNIX timestamp
     *     @var int $until Only return logs before this time, as a UNIX timestamp
     *     @var bool $timestamps Add timestamps to every log line
     *     @var string $tail Only return this number of log lines from the end of the logs.
    Specify as an integer or `all` to output all log lines.

     * }
     *
     * @param  array  $accept Accept content header application/json|text/plain
     */
    public function __construct(string $id, array $queryParameters = [], array $accept = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }

    use \Mdshack\Docker\API\v1_40\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/logs');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/json', 'text/plain']];
        }

        return $this->accept;
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['follow', 'stdout', 'stderr', 'since', 'until', 'timestamps', 'tail']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['follow' => false, 'stdout' => false, 'stderr' => false, 'since' => 0, 'until' => 0, 'timestamps' => false, 'tail' => 'all']);
        $optionsResolver->addAllowedTypes('follow', ['bool']);
        $optionsResolver->addAllowedTypes('stdout', ['bool']);
        $optionsResolver->addAllowedTypes('stderr', ['bool']);
        $optionsResolver->addAllowedTypes('since', ['int']);
        $optionsResolver->addAllowedTypes('until', ['int']);
        $optionsResolver->addAllowedTypes('timestamps', ['bool']);
        $optionsResolver->addAllowedTypes('tail', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return null
     *
     * @throws \Mdshack\Docker\API\v1_40\Exception\ContainerLogsNotFoundException
     * @throws \Mdshack\Docker\API\v1_40\Exception\ContainerLogsInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && ($status === 200 && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && ($status === 404 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_40\Exception\ContainerLogsNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_40\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_40\Exception\ContainerLogsInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_40\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
