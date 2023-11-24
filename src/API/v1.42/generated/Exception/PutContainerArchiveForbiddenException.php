<?php

namespace Mdshack\Docker\API\v1_42\Exception;

class PutContainerArchiveForbiddenException extends ForbiddenException
{
    /**
     * @var \Mdshack\Docker\API\v1_42\Model\ErrorResponse
     */
    private $errorResponse;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Mdshack\Docker\API\v1_42\Model\ErrorResponse $errorResponse, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Permission denied, the volume or container rootfs is marked as read-only.');
        $this->errorResponse = $errorResponse;
        $this->response = $response;
    }
    public function getErrorResponse() : \Mdshack\Docker\API\v1_42\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}