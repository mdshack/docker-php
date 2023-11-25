<?php

namespace Mdshack\Docker\API\v1_40\Endpoint;

class ContainerStats extends \Mdshack\Docker\API\v1_40\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_40\Runtime\Client\Endpoint
{
    protected $id;

    /**
     * This endpoint returns a live stream of a container’s resource usage
    statistics.

    The `precpu_stats` is the CPU statistic of the *previous* read, and is
    used to calculate the CPU usage percentage. It is not an exact copy
    of the `cpu_stats` field.

    If either `precpu_stats.online_cpus` or `cpu_stats.online_cpus` is
    nil then for compatibility with older daemons the length of the
    corresponding `cpu_usage.percpu_usage` array should be used.

    To calculate the values shown by the `stats` command of the docker cli tool
    the following formulas can be used:
     * used_memory = `memory_stats.usage - memory_stats.stats.cache`
     * available_memory = `memory_stats.limit`
     * Memory usage % = `(used_memory / available_memory) * 100.0`
     * cpu_delta = `cpu_stats.cpu_usage.total_usage - precpu_stats.cpu_usage.total_usage`
     * system_cpu_delta = `cpu_stats.system_cpu_usage - precpu_stats.system_cpu_usage`
     * number_cpus = `lenght(cpu_stats.cpu_usage.percpu_usage)` or `cpu_stats.online_cpus`
     * CPU usage % = `(cpu_delta / system_cpu_delta) * number_cpus * 100.0`

     *
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var bool $stream Stream the output. If false, the stats will be output once and then
    it will disconnect.

     * }
     */
    public function __construct(string $id, array $queryParameters = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }

    use \Mdshack\Docker\API\v1_40\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/stats');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['stream']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['stream' => true]);
        $optionsResolver->addAllowedTypes('stream', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return null
     *
     * @throws \Mdshack\Docker\API\v1_40\Exception\ContainerStatsNotFoundException
     * @throws \Mdshack\Docker\API\v1_40\Exception\ContainerStatsInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && ($status === 200 && mb_strpos($contentType, 'application/json') !== false)) {
            return json_decode($body);
        }
        if (is_null($contentType) === false && ($status === 404 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_40\Exception\ContainerStatsNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_40\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_40\Exception\ContainerStatsInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_40\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
