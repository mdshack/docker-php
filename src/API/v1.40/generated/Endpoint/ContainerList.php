<?php

namespace Mdshack\Docker\API\v1_40\Endpoint;

class ContainerList extends \Mdshack\Docker\API\v1_40\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_40\Runtime\Client\Endpoint
{
    /**
    * Returns a list of containers. For details on the format, see the
    [inspect endpoint](#operation/ContainerInspect).
    
    Note that it uses a different, smaller representation of a container
    than inspecting a single container. For example, the list of linked
    containers is not propagated .
    
    *
    * @param array $queryParameters {
    *     @var bool $all Return all containers. By default, only running containers are shown.
    
    *     @var int $limit Return this number of most recently created containers, including
    non-running ones.
    
    *     @var bool $size Return the size of container as fields `SizeRw` and `SizeRootFs`.
    
    *     @var string $filters Filters to process on the container list, encoded as JSON (a
    `map[string][]string`). For example, `{"status": ["paused"]}` will
    only return paused containers.
    
    Available filters:
    
    - `ancestor`=(`<image-name>[:<tag>]`, `<image id>`, or `<image@digest>`)
    - `before`=(`<container id>` or `<container name>`)
    - `expose`=(`<port>[/<proto>]`|`<startport-endport>/[<proto>]`)
    - `exited=<int>` containers with exit code of `<int>`
    - `health`=(`starting`|`healthy`|`unhealthy`|`none`)
    - `id=<ID>` a container's ID
    - `isolation=`(`default`|`process`|`hyperv`) (Windows daemon only)
    - `is-task=`(`true`|`false`)
    - `label=key` or `label="key=value"` of a container label
    - `name=<name>` a container's name
    - `network`=(`<network id>` or `<network name>`)
    - `publish`=(`<port>[/<proto>]`|`<startport-endport>/[<proto>]`)
    - `since`=(`<container id>` or `<container name>`)
    - `status=`(`created`|`restarting`|`running`|`removing`|`paused`|`exited`|`dead`)
    - `volume`=(`<volume name>` or `<mount point destination>`)
    
    * }
    */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    use \Mdshack\Docker\API\v1_40\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/containers/json';
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
        $optionsResolver->setDefined(array('all', 'limit', 'size', 'filters'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('all' => false, 'size' => false));
        $optionsResolver->addAllowedTypes('all', array('bool'));
        $optionsResolver->addAllowedTypes('limit', array('int'));
        $optionsResolver->addAllowedTypes('size', array('bool'));
        $optionsResolver->addAllowedTypes('filters', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Mdshack\Docker\API\v1_40\Exception\ContainerListBadRequestException
     * @throws \Mdshack\Docker\API\v1_40\Exception\ContainerListInternalServerErrorException
     *
     * @return null|\Mdshack\Docker\API\v1_40\Model\ContainerSummary[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_40\\Model\\ContainerSummary[]', 'json');
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_40\Exception\ContainerListBadRequestException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_40\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_40\Exception\ContainerListInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_40\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}