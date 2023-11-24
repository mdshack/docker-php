<?php

namespace Mdshack\Docker\API\_____\Endpoint;

class ImageTag extends \Mdshack\Docker\API\_____\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\_____\Runtime\Client\Endpoint
{
    protected $name;
    protected $accept;
    /**
     * Tag an image so that it becomes part of a repository.
     *
     * @param string $name Image name or ID to tag.
     * @param array $queryParameters {
     *     @var string $repo The repository to tag in. For example, `someuser/someimage`.
     *     @var string $tag The name of the new tag.
     * }
     * @param array $accept Accept content header application/json|text/plain
     */
    public function __construct(string $name, array $queryParameters = array(), array $accept = array())
    {
        $this->name = $name;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }
    use \Mdshack\Docker\API\_____\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{name}'), array($this->name), '/images/{name}/tag');
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
        $optionsResolver->setDefined(array('repo', 'tag'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('repo', array('string'));
        $optionsResolver->addAllowedTypes('tag', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Mdshack\Docker\API\_____\Exception\ImageTagBadRequestException
     * @throws \Mdshack\Docker\API\_____\Exception\ImageTagNotFoundException
     * @throws \Mdshack\Docker\API\_____\Exception\ImageTagConflictException
     * @throws \Mdshack\Docker\API\_____\Exception\ImageTagInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (201 === $status) {
        }
        if (is_null($contentType) === false && (400 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\_____\Exception\ImageTagBadRequestException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\_____\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\_____\Exception\ImageTagNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\_____\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (409 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\_____\Exception\ImageTagConflictException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\_____\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\_____\Exception\ImageTagInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\_____\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}