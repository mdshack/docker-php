<?php

namespace Mdshack\Docker\API\v1_42\Exception;

class UnauthorizedException extends \RuntimeException implements ClientException
{
    public function __construct(string $message)
    {
        parent::__construct($message, 401);
    }
}