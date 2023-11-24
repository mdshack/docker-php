<?php

namespace Mdshack\Docker\API\v1_42\Runtime\Client;

use Symfony\Component\OptionsResolver\Options;
interface CustomQueryResolver
{
    public function __invoke(Options $options, $value);
}