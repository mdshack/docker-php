<?php

namespace Mdshack\Docker\API$NAMESPACE\Exception;

class PutContainerArchiveNotFoundException extends NotFoundException
{
    /**
     * @var \Mdshack\Docker\API$NAMESPACE\Model\ErrorResponse
     */
    private $errorResponse;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Mdshack\Docker\API$NAMESPACE\Model\ErrorResponse $errorResponse, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('No such container or path does not exist inside the container');
        $this->errorResponse = $errorResponse;
        $this->response = $response;
    }
    public function getErrorResponse() : \Mdshack\Docker\API$NAMESPACE\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}