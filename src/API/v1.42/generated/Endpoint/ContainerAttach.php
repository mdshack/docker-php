<?php

namespace Mdshack\Docker\API\v1_42\Endpoint;

class ContainerAttach extends \Mdshack\Docker\API\v1_42\Runtime\Client\BaseEndpoint implements \Mdshack\Docker\API\v1_42\Runtime\Client\Endpoint
{
    protected $id;

    protected $accept;

    /**
     * Attach to a container to read its output or send it input. You can attach
    to the same container multiple times and you can reattach to containers
    that have been detached.

    Either the `stream` or `logs` parameter must be `true` for this endpoint
    to do anything.

    See the [documentation for the `docker attach` command](https://docs.docker.com/engine/reference/commandline/attach/)
    for more details.

    ### Hijacking

    This endpoint hijacks the HTTP connection to transport `stdin`, `stdout`,
    and `stderr` on the same socket.

    This is the response from the daemon for an attach request:

    ```
    HTTP/1.1 200 OK
    Content-Type: application/vnd.docker.raw-stream

    [STREAM]
    ```

    After the headers and two new lines, the TCP connection can now be used
    for raw, bidirectional communication between the client and server.

    To hint potential proxies about connection hijacking, the Docker client
    can also optionally send connection upgrade headers.

    For example, the client sends this request to upgrade the connection:

    ```
    POST /containers/16253994b7c4/attach?stream=1&stdout=1 HTTP/1.1
    Upgrade: tcp
    Connection: Upgrade
    ```

    The Docker daemon will respond with a `101 UPGRADED` response, and will
    similarly follow with the raw stream:

    ```
    HTTP/1.1 101 UPGRADED
    Content-Type: application/vnd.docker.raw-stream
    Connection: Upgrade
    Upgrade: tcp

    [STREAM]
    ```

    ### Stream format

    When the TTY setting is disabled in [`POST /containers/create`](#operation/ContainerCreate),
    the HTTP Content-Type header is set to application/vnd.docker.multiplexed-stream
    and the stream over the hijacked connected is multiplexed to separate out
    `stdout` and `stderr`. The stream consists of a series of frames, each
    containing a header and a payload.

    The header contains the information which the stream writes (`stdout` or
    `stderr`). It also contains the size of the associated frame encoded in
    the last four bytes (`uint32`).

    It is encoded on the first eight bytes like this:

    ```go
    header := [8]byte{STREAM_TYPE, 0, 0, 0, SIZE1, SIZE2, SIZE3, SIZE4}
    ```

    `STREAM_TYPE` can be:

    - 0: `stdin` (is written on `stdout`)
    - 1: `stdout`
    - 2: `stderr`

    `SIZE1, SIZE2, SIZE3, SIZE4` are the four bytes of the `uint32` size
    encoded as big endian.

    Following the header is the payload, which is the specified number of
    bytes of `STREAM_TYPE`.

    The simplest way to implement this protocol is the following:

    1. Read 8 bytes.
    2. Choose `stdout` or `stderr` depending on the first byte.
    3. Extract the frame size from the last four bytes.
    4. Read the extracted size and output it on the correct output.
    5. Goto 1.

    ### Stream format when using a TTY

    When the TTY setting is enabled in [`POST /containers/create`](#operation/ContainerCreate),
    the stream is not multiplexed. The data exchanged over the hijacked
    connection is simply the raw data from the process PTY and client's
    `stdin`.

     *
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var string $detachKeys Override the key sequence for detaching a container.Format is a single
     *     @var bool $logs Replay previous logs from the container.

     *     @var bool $stream Stream attached streams from the time the request was made onwards.

     *     @var bool $stdin Attach to `stdin`
     *     @var bool $stdout Attach to `stdout`
     *     @var bool $stderr Attach to `stderr`
     * }
     *
     * @param  array  $accept Accept content header application/vnd.docker.raw-stream|application/vnd.docker.multiplexed-stream|application/json
     */
    public function __construct(string $id, array $queryParameters = [], array $accept = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }

    use \Mdshack\Docker\API\v1_42\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/attach');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/vnd.docker.raw-stream', 'application/vnd.docker.multiplexed-stream', 'application/json']];
        }

        return $this->accept;
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['detachKeys', 'logs', 'stream', 'stdin', 'stdout', 'stderr']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['logs' => false, 'stream' => false, 'stdin' => false, 'stdout' => false, 'stderr' => false]);
        $optionsResolver->addAllowedTypes('detachKeys', ['string']);
        $optionsResolver->addAllowedTypes('logs', ['bool']);
        $optionsResolver->addAllowedTypes('stream', ['bool']);
        $optionsResolver->addAllowedTypes('stdin', ['bool']);
        $optionsResolver->addAllowedTypes('stdout', ['bool']);
        $optionsResolver->addAllowedTypes('stderr', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return null
     *
     * @throws \Mdshack\Docker\API\v1_42\Exception\ContainerAttachNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 101) {
        }
        if ($status === 200) {
        }
        if ($status === 400) {
        }
        if (is_null($contentType) === false && ($status === 404 && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Mdshack\Docker\API\v1_42\Exception\ContainerAttachNotFoundException($response);
        }
        if ($status === 500) {
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
