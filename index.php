<?php

use Mdshack\Docker\Client;

require './vendor/autoload.php';

// List containers

// $resp = (new Client())->listContainers()->wait();

// var_dump(json_decode($resp->getBody()->getContents()));

// Create cotainer

$resp = (new Client())->createContainer('test3', [
    'image' => 'ubuntu',
])->wait();

var_dump(json_decode($resp->getBody()->getContents()));
