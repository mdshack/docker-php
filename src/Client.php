<?php

namespace Mdshack\Docker;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Promise\PromiseInterface;

class Client
{
    protected \GuzzleHttp\Client $http;

    public function __construct(
        protected string $dockerVersion = 'v1.42',
        protected string $unixSocket = '/var/run/docker.sock',
    ) {
        $this->http = new \GuzzleHttp\Client([
            'base_uri' => "$this->dockerVersion/",
            'handler' => $this->createHandlerStack(),
            'curl' => [
                CURLOPT_UNIX_SOCKET_PATH => $this->unixSocket,
            ],
        ]);
    }

    /**
     * @see https://docs.docker.com/engine/api/v1.42/#tag/Container/operation/ContainerList
     */
    public function listContainers(array $filters = []): PromiseInterface
    {
        $query = $filters
            ? $this->buildQuery(['filters' => json_encode($filters)])
            : '';

        // TODO: handle 400

        return $this->http->getAsync("containers/json$query");
    }

    /**
     * @see https://docs.docker.com/engine/api/v1.42/#tag/Container/operation/ContainerCreate
     */
    public function createContainer(string $name, array $config = [], bool $pullImage = true): PromiseInterface
    {
        $config = array_merge([
            'tty' => true,
        ], $config);

        if ($pullImage && $image = ($config['image'] ?? $config['Image'])) {
            $this->pullImage($image)->wait();
        }

        // TODO: handle 400
        // TODO: handle 404
        // TODO: handle 409

        return $this->http->postAsync('containers/create', [
            'query' => [
                'name' => $name,
            ],
            'body' => json_encode($config),
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    // public function inspectContainer(string $name) : PromiseInterface
    // {

    // }

    // public function getContainerLogs(string $name) : PromiseInterface
    // {

    // }

    /**
     * @see https://docs.docker.com/engine/api/v1.42/#tag/Container/operation/ContainerStart
     */
    public function startContainer(string $name): PromiseInterface
    {
        // TODO: handle 304
        // TODO: handle 404

        return $this->http->postAsync("containers/$name/start");
    }

    /**
     * @see https://docs.docker.com/engine/api/v1.42/#tag/Container/operation/ContainerStop
     */
    public function stopContainer(string $name): PromiseInterface
    {
        // TODO: handle 304
        // TODO: handle 404

        return $this->http->postAsync("containers/$name/stop");
    }

    /**
     * @see https://docs.docker.com/engine/api/v1.42/#tag/Container/operation/ContainerRestart
     */
    public function restartContainer(string $name): PromiseInterface
    {
        // TODO: handle 404

        return $this->http->postAsync("containers/$name/restart");
    }

    /**
     * @see https://docs.docker.com/engine/api/v1.42/#tag/Container/operation/ContainerKill
     */
    public function killContainer(string $name): PromiseInterface
    {
        // TODO: handle 404
        // TODO: handle 409

        return $this->http->postAsync("containers/$name/kill");
    }

    /**
     * @see https://docs.docker.com/engine/api/v1.42/#tag/Container/operation/ContainerWait
     */
    public function waitForContainer(string $name): PromiseInterface
    {
        // TODO: handle 400
        // TODO: handle 404

        return $this->http->postAsync("containers/$name/wait");
    }

    /**
     * @see https://docs.docker.com/engine/api/v1.42/#tag/Container/operation/ContainerDelete
     */
    public function removeContainer(string $name, bool $removeVolumes = true, bool $force = true): PromiseInterface
    {
        return $this->http->deleteAsync("containers/$name", [
            'query' => [
                'v' => $removeVolumes,
                'force' => $force,
            ],
        ]);
    }

    /**
     * @see https://docs.docker.com/engine/api/v1.42/#tag/Image/operation/ImageCreate
     */
    public function pullImage(string $image): PromiseInterface
    {
        if (! strpos($image, ':')) {
            $image .= ':latest';
        }

        return $this->http->postAsync('images/create', [
            'query' => [
                'fromImage' => $image,
            ],
        ]);
    }

    protected function createHandlerStack(): HandlerStack
    {
        $stack = HandlerStack::create();

        // TODO: add common resp handling

        return $stack;
    }

    /**
     * @see https://docs.docker.com/engine/api/v1.42/#tag/Container/operation/ContainerList - Expects JSON encoded filters passed as query params in some cases
     */
    protected function buildQuery(array $query): string
    {
        return '?'.urldecode(http_build_query($query));
    }
}
