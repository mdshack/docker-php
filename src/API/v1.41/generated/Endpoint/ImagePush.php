<?php

namespace Mdshack\Docker\API\v1_41\Endpoint;

class ImagePush extends \Mdshack\Docker\API\v1_41\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_41\Runtime\Client\Endpoint
{
    protected $name;

    protected $accept;

    /**
     * Push an image to a registry.

    If you wish to push an image on to a private registry, that image must
    already have a tag which references the registry. For example,
    `registry.example.com/myimage:latest`.

    The push is cancelled if the HTTP connection is closed.

     *
     * @param  string  $name Image name or ID.
     * @param  array  $queryParameters {
     *
     *     @var string $tag The tag to associate with the image on the registry.
     * }
     *
     * @param  array  $headerParameters {
     *
     *     @var string $X-Registry-Auth A base64url-encoded auth configuration.

     * }
     * @param  array  $accept Accept content header application/json|text/plain
     */
    public function __construct(string $name, array $queryParameters = [], array $headerParameters = [], array $accept = [])
    {
        $this->name = $name;
        $this->queryParameters = $queryParameters;
        $this->headerParameters = $headerParameters;
        $this->accept = $accept;
    }

    use \Mdshack\Docker\API\v1_41\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{name}'], [$this->name], '/images/{name}/push');
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
        $optionsResolver->setDefined(['tag']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('tag', ['string']);

        return $optionsResolver;
    }

    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['X-Registry-Auth']);
        $optionsResolver->setRequired(['X-Registry-Auth']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('X-Registry-Auth', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return null
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImagePushNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImagePushInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 200) {
        }
        if (is_null($contentType) === false && ($status === 404 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\ImagePushNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\ImagePushInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
