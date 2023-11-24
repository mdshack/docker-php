<?php

namespace Mdshack\Docker\API\v1_42\Endpoint;

class ExecStart extends \Mdshack\Docker\API\v1_42\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_42\Runtime\Client\Endpoint
{
    protected $id;
    protected $accept;
    /**
    * Starts a previously set up exec instance. If detach is true, this endpoint
    returns immediately after starting the command. Otherwise, it sets up an
    interactive session with the command.
    
    *
    * @param string $id Exec instance ID
    * @param null|\Mdshack\Docker\API\v1_42\Model\ExecIdStartPostBody $requestBody 
    * @param array $accept Accept content header application/vnd.docker.raw-stream|application/vnd.docker.multiplexed-stream
    */
    public function __construct(string $id, ?\Mdshack\Docker\API\v1_42\Model\ExecIdStartPostBody $requestBody = null, array $accept = array())
    {
        $this->id = $id;
        $this->body = $requestBody;
        $this->accept = $accept;
    }
    use \Mdshack\Docker\API\v1_42\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/exec/{id}/start');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if ($this->body instanceof \Mdshack\Docker\API\v1_42\Model\ExecIdStartPostBody) {
            return array(array('Content-Type' => array('application/json')), $serializer->serialize($this->body, 'json'));
        }
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        if (empty($this->accept)) {
            return array('Accept' => array('application/vnd.docker.raw-stream', 'application/vnd.docker.multiplexed-stream'));
        }
        return $this->accept;
    }
    /**
     * {@inheritdoc}
     *
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
        }
        if (404 === $status) {
        }
        if (409 === $status) {
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}