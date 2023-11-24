<?php

namespace Mdshack\Docker\API\v1_43\Exception;

class NetworkInspectInternalServerErrorException extends InternalServerErrorException
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
        parent::__construct('Server error');
        $this->errorResponse = $errorResponse;
        $this->response = $response;
    }

    public function getErrorResponse(): \Mdshack\Docker\API\v1_43\Model\ErrorResponse
    {
        return $this->errorResponse;
    }

    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
