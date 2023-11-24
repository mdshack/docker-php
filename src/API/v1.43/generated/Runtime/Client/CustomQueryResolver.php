<?php

namespace Mdshack\Docker\API${NAMESPACE}\Runtime\Client;

use Symfony\Component\OptionsResolver\Options;
interface CustomQueryResolver
{
    public function __invoke(Options $options, $value);
}