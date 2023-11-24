<?php

namespace Mdshack\Docker\API${NAMESPACE}\Endpoint;

class ImageSearch extends \Mdshack\Docker\API${NAMESPACE}\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API${NAMESPACE}\Runtime\Client\Endpoint
{
    /**
    * Search for an image on Docker Hub.
    *
    * @param array $queryParameters {
    *     @var string $term Term to search
    *     @var int $limit Maximum number of results to return
    *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to process on the images list. Available filters:
    
    - `is-automated=(true|false)`
    - `is-official=(true|false)`
    - `stars=<number>` Matches images that has at least 'number' stars.
    
    * }
    */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    use \Mdshack\Docker\API${NAMESPACE}\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/images/search';
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
        $optionsResolver->setDefined(array('term', 'limit', 'filters'));
        $optionsResolver->setRequired(array('term'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('term', array('string'));
        $optionsResolver->addAllowedTypes('limit', array('int'));
        $optionsResolver->addAllowedTypes('filters', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Mdshack\Docker\API${NAMESPACE}\Exception\ImageSearchInternalServerErrorException
     *
     * @return null|\Mdshack\Docker\API${NAMESPACE}\Model\ImagesSearchGetResponse200Item[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API${NAMESPACE}\\Model\\ImagesSearchGetResponse200Item[]', 'json');
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API${NAMESPACE}\Exception\ImageSearchInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API${NAMESPACE}\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}