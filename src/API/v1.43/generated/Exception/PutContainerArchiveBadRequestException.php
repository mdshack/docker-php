<?php

namespace Mdshack\Docker\API\_____\Exception;

class PutContainerArchiveBadRequestException extends BadRequestException
{
    /**
     * @var \Mdshack\Docker\API\_____\Model\ErrorResponse
     */
    private $errorResponse;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Mdshack\Docker\API\_____\Model\ErrorResponse $errorResponse, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Bad parameter');
        $this->errorResponse = $errorResponse;
        $this->response = $response;
    }
    public function getErrorResponse() : \Mdshack\Docker\API\_____\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}