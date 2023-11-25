<?php

namespace Mdshack\Docker\API\v1_40\Endpoint;

class ExecStart extends \Mdshack\Docker\API\v1_40\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_40\Runtime\Client\Endpoint
{
    protected $id;

    /**
     * Starts a previously set up exec instance. If detach is true, this endpoint
    returns immediately after starting the command. Otherwise, it sets up an
    interactive session with the command.

     *
     * @param  string  $id Exec instance ID
     */
    public function __construct(string $id, \Mdshack\Docker\API\v1_40\Model\ExecIdStartPostBody $requestBody = null)
    {
        $this->id = $id;
        $this->body = $requestBody;
    }

    use \Mdshack\Docker\API\v1_40\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/exec/{id}/start');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Mdshack\Docker\API\v1_40\Model\ExecIdStartPostBody) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/vnd.docker.raw-stream']];
    }

    /**
     * {@inheritdoc}
     *
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 200) {
        }
        if ($status === 404) {
        }
        if ($status === 409) {
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
