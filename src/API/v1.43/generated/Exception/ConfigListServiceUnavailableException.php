<?php

namespace Mdshack\Docker\API\v1_43\Exception;

class ConfigListServiceUnavailableException extends ServiceUnavailableException
{
    /**
     * @var \Mdshack\Docker\API\v1_43\Model\ErrorResponse
     */
    private $errorResponse;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Mdshack\Docker\API\v1_43\Model\ErrorResponse $errorResponse, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('node is not part of a swarm');
        $this->errorResponse = $errorResponse;
        $this->response = $response;
    }
    public function getErrorResponse() : \Mdshack\Docker\API\v1_43\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}