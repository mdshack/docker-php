<?php

namespace Mdshack\Docker\API\v1_41\Endpoint;

class ServiceUpdate extends \Mdshack\Docker\API\v1_41\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_41\Runtime\Client\Endpoint
{
    protected $id;

    /**
     * @param  string  $id ID or name of service.
     * @param  array  $queryParameters {
     *
     *     @var int $version The version number of the service object being updated. This is
     *     @var string $registryAuthFrom If the `X-Registry-Auth` header is not specified, this parameter
     *     @var string $rollback Set to this parameter to `previous` to cause a server-side rollback
     * }
     * @param  array  $headerParameters {
     *
     *     @var string $X-Registry-Auth A base64url-encoded auth configuration for pulling from private
    registries.

    Refer to the [authentication section](#section/Authentication) for
    details.

     * }
     */
    public function __construct(string $id, \Mdshack\Docker\API\v1_41\Model\ServicesIdUpdatePostBody $requestBody, array $queryParameters = [], array $headerParameters = [])
    {
        $this->id = $id;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
        $this->headerParameters = $headerParameters;
    }

    use \Mdshack\Docker\API\v1_41\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/services/{id}/update');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Mdshack\Docker\API\v1_41\Model\ServicesIdUpdatePostBody) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
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
        $optionsResolver->setDefined(['version', 'registryAuthFrom', 'rollback']);
        $optionsResolver->setRequired(['version']);
        $optionsResolver->setDefaults(['registryAuthFrom' => 'spec']);
        $optionsResolver->addAllowedTypes('version', ['int']);
        $optionsResolver->addAllowedTypes('registryAuthFrom', ['string']);
        $optionsResolver->addAllowedTypes('rollback', ['string']);

        return $optionsResolver;
    }

    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['X-Registry-Auth']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('X-Registry-Auth', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return null|\Mdshack\Docker\API\v1_41\Model\ServiceUpdateResponse
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceUpdateBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceUpdateNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceUpdateInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceUpdateServiceUnavailableException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && ($status === 200 && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ServiceUpdateResponse', 'json');
        }
        if (is_null($contentType) === false && ($status === 400 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\ServiceUpdateBadRequestException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 404 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\ServiceUpdateNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\ServiceUpdateInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 503 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_41\Exception\ServiceUpdateServiceUnavailableException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_41\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
