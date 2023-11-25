<?php

namespace Mdshack\Docker\API\v1_40\Exception;

class ContainerRenameNotFoundException extends NotFoundException
{
    /**
     * @var \Mdshack\Docker\API\v1_40\Model\ErrorResponse
     */
    private $errorResponse;

    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    public function __construct(\Mdshack\Docker\API\v1_40\Model\ErrorResponse $errorResponse, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('no such container');
        $this->errorResponse = $errorResponse;
        $this->response = $response;
    }

    public function getErrorResponse(): \Mdshack\Docker\API\v1_40\Model\ErrorResponse
    {
        return $this->errorResponse;
    }

    public function getResponse(): \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}
