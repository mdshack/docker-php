<?php

namespace Mdshack\Docker\API\v1_41\Endpoint;

class ImageTag extends \Mdshack\Docker\API\v1_41\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_41\Runtime\Client\Endpoint
{
    protected $name;

    protected $accept;

    /**
     * Tag an image so that it becomes part of a repository.
     *
     * @param  string  $name Image name or ID to tag.
     * @param  array  $queryParameters {
     *
     *     @var string $repo The repository to tag in. For example, `someuser/someimage`.
     *     @var string $tag The name of the new tag.
     * }
     *
     * @param  array  $accept Accept content header application/json|text/plain
     */
    public function __construct(string $name, array $queryParameters = [], array $accept = [])
    {
        $this->name = $name;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }

    use \Mdshack\Docker\API\v1_41\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{name}'], [$this->name], '/images/{name}/tag');
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
        $optionsResolver->setDefined(['repo', 'tag']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('repo', ['string']);
        $optionsResolver->addAllowedTypes('tag', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return null
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageTagBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageTagNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageTagConflictException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageTagInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 201) {
        }
        if (is_null($contentType) === false && ($status === 400 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\ImageTagBadRequestException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 404 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\ImageTagNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 409 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\ImageTagConflictException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\ImageTagInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
