<?php

namespace Mdshack\Docker\API\v1_42\Exception;

class ServiceLogsNotFoundException extends NotFoundException
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Psr\Http\Message\ResponseInterface $response = null)
    {
        parent::__construct('no such service');
        $this->response = $response;
    }
    public function getResponse() : ?\Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}