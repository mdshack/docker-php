<?php

namespace Mdshack\Docker\API\v1_40\Endpoint;

class ContainerCreate extends \Mdshack\Docker\API\v1_40\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_40\Runtime\Client\Endpoint
{
    /**
     * @param  array  $queryParameters {
     *
     *     @var string $name Assign the specified name to the container. Must match
    `/?[a-zA-Z0-9][a-zA-Z0-9_.-]+`.

     * }
     */
    public function __construct(\Mdshack\Docker\API\v1_40\Model\ContainersCreatePostBody $requestBody, array $queryParameters = [])
    {
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }

    use \Mdshack\Docker\API\v1_40\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/containers/create';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Mdshack\Docker\API\v1_40\Model\ContainersCreatePostBody) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }
        if ($this->body instanceof \Mdshack\Docker\API\v1_40\Model\ContainersCreatePostBody) {
            return [['Content-Type' => ['application/octet-stream']], $this->body];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['name']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('name', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return null|\Mdshack\Docker\API\v1_40\Model\ContainersCreatePostResponse201
     *
     * @throws \Mdshack\Docker\API\v1_40\Exception\ContainerCreateBadRequestException
     * @throws \Mdshack\Docker\API\v1_40\Exception\ContainerCreateNotFoundException
     * @throws \Mdshack\Docker\API\v1_40\Exception\ContainerCreateConflictException
     * @throws \Mdshack\Docker\API\v1_40\Exception\ContainerCreateInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && ($status === 201 && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_40\\Model\\ContainersCreatePostResponse201', 'json');
        }
        if (is_null($contentType) === false && ($status === 400 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_40\Exception\ContainerCreateBadRequestException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_40\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 404 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_40\Exception\ContainerCreateNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_40\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 409 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_40\Exception\ContainerCreateConflictException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_40\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_40\Exception\ContainerCreateInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_40\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
