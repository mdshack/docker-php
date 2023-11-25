<?php

namespace Mdshack\Docker\API\v1_41\Exception;

class SwarmUpdateBadRequestException extends BadRequestException
{
    /**
     * @var \Mdshack\Docker\API\v1_41\Model\ErrorResponse
     */
    private $errorResponse;

    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    public function __construct(\Mdshack\Docker\API\v1_41\Model\ErrorResponse $errorResponse, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('bad parameter');
        $this->errorResponse = $errorResponse;
        $this->response = $response;
    }

    public function getErrorResponse(): \Mdshack\Docker\API\v1_41\Model\ErrorResponse
    {
        return $this->errorResponse;
    }

    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}