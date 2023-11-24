<?php

namespace Mdshack\Docker\API\v1_41\Exception;

class ConflictException extends \RuntimeException implements ClientException
{
    public function __construct(string $message)
    {
        parent::__construct($message, 409);
    }
}
