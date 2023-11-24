<?php

namespace Mdshack\Docker\API\v1_42\Endpoint;

class PutContainerArchive extends \Mdshack\Docker\API\v1_42\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_42\Runtime\Client\Endpoint
{
    protected $id;

    protected $accept;

    /**
     * Upload a tar archive to be extracted to a path in the filesystem of container id.
    `path` parameter is asserted to be a directory. If it exists as a file, 400 error
    will be returned with message "not a directory".

     *
     * @param  string  $id ID or name of the container
     * @param  string|resource|\Psr\Http\Message\StreamInterface  $requestBody
     * @param  array  $queryParameters {
     *
     *     @var string $path Path to a directory in the container to extract the archive’s contents into.
     *     @var string $noOverwriteDirNonDir If `1`, `true`, or `True` then it will be an error if unpacking the
     *     @var string $copyUIDGID If `1`, `true`, then it will copy UID/GID maps to the dest file or
    dir

     * }
     *
     * @param  array  $accept Accept content header application/json|text/plain
     */
    public function __construct(string $id, $requestBody, array $queryParameters = [], array $accept = [])
    {
        $this->id = $id;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }

    use \Mdshack\Docker\API\v1_42\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/archive');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if (is_string($this->body) or is_resource($this->body) or $this->body instanceof \Psr\Http\Message\StreamInterface) {
            return [['Content-Type' => ['application/x-tar']], $this->body];
        }
        if (is_string($this->body) or is_resource($this->body) or $this->body instanceof \Psr\Http\Message\StreamInterface) {
            return [['Content-Type' => ['application/octet-stream']], $this->body];
        }

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
        $optionsResolver->setDefined(['path', 'noOverwriteDirNonDir', 'copyUIDGID']);
        $optionsResolver->setRequired(['path']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('path', ['string']);
        $optionsResolver->addAllowedTypes('noOverwriteDirNonDir', ['string']);
        $optionsResolver->addAllowedTypes('copyUIDGID', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return null
     *
     * @throws \Mdshack\Docker\API\v1_42\Exception\PutContainerArchiveBadRequestException
     * @throws \Mdshack\Docker\API\v1_42\Exception\PutContainerArchiveForbiddenException
     * @throws \Mdshack\Docker\API\v1_42\Exception\PutContainerArchiveNotFoundException
     * @throws \Mdshack\Docker\API\v1_42\Exception\PutContainerArchiveInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 200) {
        }
        if (is_null($contentType) === false && ($status === 400 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\PutContainerArchiveBadRequestException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 403 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\PutContainerArchiveForbiddenException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 404 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\PutContainerArchiveNotFoundException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
        if (is_null($contentType) === false && ($status === 500 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\PutContainerArchiveInternalServerErrorException($serializer->deserialize($body, 'Mdshack\\Docker\\API\\v1_42\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
