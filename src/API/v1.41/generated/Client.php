<?php

namespace Mdshack\Docker\API\v1_41;

class Client extends \Mdshack\Docker\API\v1_41\Runtime\Client\Client
{
    /**
     * Returns a list of containers. For details on the format, see the
    [inspect endpoint](#operation/ContainerInspect).

    Note that it uses a different, smaller representation of a container
    than inspecting a single container. For example, the list of linked
    containers is not propagated .

     *
     * @param  array  $queryParameters {
     *
     *     @var bool $all Return all containers. By default, only running containers are shown.

     *     @var int $limit Return this number of most recently created containers, including
     *     @var bool $size Return the size of container as fields `SizeRw` and `SizeRootFs`.

     *     @var string $filters Filters to process on the container list, encoded as JSON (a
     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ContainerSummary[]|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerListBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerListInternalServerErrorException
     */
    public function containerList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerList($queryParameters), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var string $name Assign the specified name to the container. Must match
     *     @var string $platform Platform in the format `os[/arch[/variant]]` used for image lookup.

     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ContainersCreatePostResponse201|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerCreateBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerCreateNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerCreateConflictException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerCreateInternalServerErrorException
     */
    public function containerCreate(Model\ContainersCreatePostBody $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerCreate($requestBody, $queryParameters), $fetch);
    }

    /**
     * Return low-level information about a container.
     *
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var bool $size Return the size of container as fields `SizeRw` and `SizeRootFs`
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ContainersIdJsonGetResponse200|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerInspectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerInspectInternalServerErrorException
     */
    public function containerInspect(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerInspect($id, $queryParameters), $fetch);
    }

    /**
     * On Unix systems, this is done by running the `ps` command. This endpoint
    is not supported on Windows.

     *
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var string $ps_args The arguments to pass to `ps`. For example, `aux`
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Mdshack\Docker\API\v1_41\Model\ContainersIdTopGetJsonResponse200|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerTopNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerTopInternalServerErrorException
     */
    public function containerTop(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerTop($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Get `stdout` and `stderr` logs from a container.

    Note: This endpoint works only for containers with the `json-file` or
    `journald` logging driver.

     *
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var bool $follow Keep connection after returning logs.
     *     @var bool $stdout Return logs from `stdout`
     *     @var bool $stderr Return logs from `stderr`
     *     @var int $since Only return logs since this time, as a UNIX timestamp
     *     @var int $until Only return logs before this time, as a UNIX timestamp
     *     @var bool $timestamps Add timestamps to every log line
     *     @var string $tail Only return this number of log lines from the end of the logs.
    Specify as an integer or `all` to output all log lines.

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerLogsNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerLogsInternalServerErrorException
     */
    public function containerLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerLogs($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Returns which files in a container's filesystem have been added, deleted,
    or modified. The `Kind` of modification can be one of:

    - `0`: Modified
    - `1`: Added
    - `2`: Deleted

     *
     * @param  string  $id ID or name of the container
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ContainersIdChangesGetResponse200Item[]|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerChangesNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerChangesInternalServerErrorException
     */
    public function containerChanges(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerChanges($id), $fetch);
    }

    /**
     * Export the contents of a container as a tarball.
     *
     * @param  string  $id ID or name of the container
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/octet-stream|application/json
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerExportNotFoundException
     */
    public function containerExport(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerExport($id, $accept), $fetch);
    }

    /**
     * This endpoint returns a live stream of a container’s resource usage
    statistics.

    The `precpu_stats` is the CPU statistic of the *previous* read, and is
    used to calculate the CPU usage percentage. It is not an exact copy
    of the `cpu_stats` field.

    If either `precpu_stats.online_cpus` or `cpu_stats.online_cpus` is
    nil then for compatibility with older daemons the length of the
    corresponding `cpu_usage.percpu_usage` array should be used.

    On a cgroup v2 host, the following fields are not set
     * `blkio_stats`: all fields other than `io_service_bytes_recursive`
     * `cpu_stats`: `cpu_usage.percpu_usage`
     * `memory_stats`: `max_usage` and `failcnt`
    Also, `memory_stats.stats` fields are incompatible with cgroup v1.

    To calculate the values shown by the `stats` command of the docker cli tool
    the following formulas can be used:
     * used_memory = `memory_stats.usage - memory_stats.stats.cache`
     * available_memory = `memory_stats.limit`
     * Memory usage % = `(used_memory / available_memory) * 100.0`
     * cpu_delta = `cpu_stats.cpu_usage.total_usage - precpu_stats.cpu_usage.total_usage`
     * system_cpu_delta = `cpu_stats.system_cpu_usage - precpu_stats.system_cpu_usage`
     * number_cpus = `lenght(cpu_stats.cpu_usage.percpu_usage)` or `cpu_stats.online_cpus`
     * CPU usage % = `(cpu_delta / system_cpu_delta) * number_cpus * 100.0`

     *
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var bool $stream Stream the output. If false, the stats will be output once and then
     *     @var bool $one-shot Only get a single stat instead of waiting for 2 cycles. Must be used
    with `stream=false`.

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerStatsNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerStatsInternalServerErrorException
     */
    public function containerStats(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerStats($id, $queryParameters), $fetch);
    }

    /**
     * Resize the TTY for a container.
     *
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var int $h Height of the TTY session in characters
     *     @var int $w Width of the TTY session in characters
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header text/plain|application/json
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerResizeNotFoundException
     */
    public function containerResize(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerResize($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var string $detachKeys Override the key sequence for detaching a container. Format is a
     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerStartNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerStartInternalServerErrorException
     */
    public function containerStart(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerStart($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var int $t Number of seconds to wait before killing the container
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerStopNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerStopInternalServerErrorException
     */
    public function containerStop(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerStop($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var int $t Number of seconds to wait before killing the container
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerRestartNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerRestartInternalServerErrorException
     */
    public function containerRestart(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerRestart($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Send a POSIX signal to a container, defaulting to killing to the
    container.

     *
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var string $signal Signal to send to the container as an integer or string (e.g. `SIGINT`).

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerKillNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerKillConflictException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerKillInternalServerErrorException
     */
    public function containerKill(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerKill($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Change various configuration options of a container without having to
    recreate it.

     *
     * @param  string  $id ID or name of the container
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ContainersIdUpdatePostResponse200|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerUpdateNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerUpdateInternalServerErrorException
     */
    public function containerUpdate(string $id, Model\ContainersIdUpdatePostBody $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerUpdate($id, $requestBody), $fetch);
    }

    /**
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var string $name New name for the container
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerRenameNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerRenameConflictException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerRenameInternalServerErrorException
     */
    public function containerRename(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerRename($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Use the freezer cgroup to suspend all processes in a container.

    Traditionally, when suspending a process the `SIGSTOP` signal is used,
    which is observable by the process being suspended. With the freezer
    cgroup the process is unaware, and unable to capture, that it is being
    suspended, and subsequently resumed.

     *
     * @param  string  $id ID or name of the container
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerPauseNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerPauseInternalServerErrorException
     */
    public function containerPause(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerPause($id, $accept), $fetch);
    }

    /**
     * Resume a container which has been paused.
     *
     * @param  string  $id ID or name of the container
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerUnpauseNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerUnpauseInternalServerErrorException
     */
    public function containerUnpause(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerUnpause($id, $accept), $fetch);
    }

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
    the stream over the hijacked connected is multiplexed to separate out
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
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/vnd.docker.raw-stream|application/json
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerAttachNotFoundException
     */
    public function containerAttach(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerAttach($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var string $detachKeys Override the key sequence for detaching a container.Format is a single
     *     @var bool $logs Return logs
     *     @var bool $stream Return stream
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerAttachWebsocketBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerAttachWebsocketNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerAttachWebsocketInternalServerErrorException
     */
    public function containerAttachWebsocket(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerAttachWebsocket($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Block until a container stops, then returns the exit code.
     *
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var string $condition Wait until a container state reaches the given condition.

    Defaults to `not-running` if omitted or empty.

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ContainerWaitResponse|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerWaitBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerWaitNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerWaitInternalServerErrorException
     */
    public function containerWait(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerWait($id, $queryParameters), $fetch);
    }

    /**
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var bool $v Remove anonymous volumes associated with the container.
     *     @var bool $force If the container is running, kill it before removing it.
     *     @var bool $link Remove the specified link associated with the container.
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerDeleteBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerDeleteNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerDeleteConflictException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerDeleteInternalServerErrorException
     */
    public function containerDelete(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerDelete($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Get a tar archive of a resource in the filesystem of container id.
     *
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var string $path Resource in the container’s filesystem to archive.
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/x-tar|application/json
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerArchiveNotFoundException
     */
    public function containerArchive(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerArchive($id, $queryParameters, $accept), $fetch);
    }

    /**
     * A response header `X-Docker-Container-Path-Stat` is returned, containing
    a base64 - encoded JSON object with some filesystem header information
    about the path.

     *
     * @param  string  $id ID or name of the container
     * @param  array  $queryParameters {
     *
     *     @var string $path Resource in the container’s filesystem to archive.
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerArchiveInfoBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerArchiveInfoNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerArchiveInfoInternalServerErrorException
     */
    public function containerArchiveInfo(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerArchiveInfo($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Upload a tar archive to be extracted to a path in the filesystem of container id.
    `path` parameter is asserted to be a directory. If it exists as a file, 400 error
    will be returned with message "not a directory".

     *
     * @param  string  $id ID or name of the container
     * @param  string|resource|\Psr\Http\Message\StreamInterface  $requestBody
     * @param  array  $queryParameters {
     *
     *     @var string $path Path to a directory in the container to extract the archive’s contents into.
     *     @var string $noOverwriteDirNonDir If `1`, `true`, or `True` then it will be an error if unpacking the
     *     @var string $copyUIDGID If `1`, `true`, then it will copy UID/GID maps to the dest file or
    dir

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\PutContainerArchiveBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\PutContainerArchiveForbiddenException
     * @throws \Mdshack\Docker\API\v1_41\Exception\PutContainerArchiveNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\PutContainerArchiveInternalServerErrorException
     */
    public function putContainerArchive(string $id, $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\PutContainerArchive($id, $requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`).

     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ContainersPrunePostResponse200|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerPruneInternalServerErrorException
     */
    public function containerPrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerPrune($queryParameters), $fetch);
    }

    /**
     * Returns a list of images on the server. Note that it uses a different, smaller representation of an image than inspecting a single image.
     *
     * @param  array  $queryParameters {
     *
     *     @var bool $all Show all images. Only images from a final layer (no children) are shown by default.
     *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     *     @var bool $digests Show digest information as a `RepoDigests` field on each image.
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ImageSummary[]|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageListInternalServerErrorException
     */
    public function imageList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ImageList($queryParameters), $fetch);
    }

    /**
     * Build an image from a tar archive with a `Dockerfile` in it.

    The `Dockerfile` specifies how the image is built from the tar archive. It is typically in the archive's root, but can be at a different path or have a different name by specifying the `dockerfile` parameter. [See the `Dockerfile` reference for more information](https://docs.docker.com/engine/reference/builder/).

    The Docker daemon performs a preliminary validation of the `Dockerfile` before starting the build, and returns an error if the syntax is incorrect. After that, each instruction is run one-by-one until the ID of the new image is output.

    The build is canceled if the client drops the connection by quitting or being killed.

     *
     * @param  null|string|resource|\Psr\Http\Message\StreamInterface  $requestBody
     * @param  array  $queryParameters {
     *
     *     @var string $dockerfile Path within the build context to the `Dockerfile`. This is ignored if `remote` is specified and points to an external `Dockerfile`.
     *     @var string $t A name and optional tag to apply to the image in the `name:tag` format. If you omit the tag the default `latest` value is assumed. You can provide several `t` parameters.
     *     @var string $extrahosts Extra hosts to add to /etc/hosts
     *     @var string $remote A Git repository URI or HTTP/HTTPS context URI. If the URI points to a single text file, the file’s contents are placed into a file called `Dockerfile` and the image is built from that file. If the URI points to a tarball, the file is downloaded by the daemon and the contents therein used as the context for the build. If the URI points to a tarball and the `dockerfile` parameter is also specified, there must be a file with the corresponding path inside the tarball.
     *     @var bool $q Suppress verbose build output.
     *     @var bool $nocache Do not use the cache when building the image.
     *     @var string $cachefrom JSON array of images used for build cache resolution.
     *     @var string $pull Attempt to pull the image even if an older image exists locally.
     *     @var bool $rm Remove intermediate containers after a successful build.
     *     @var bool $forcerm Always remove intermediate containers, even upon failure.
     *     @var int $memory Set memory limit for build.
     *     @var int $memswap Total memory (memory + swap). Set as `-1` to disable swap.
     *     @var int $cpushares CPU shares (relative weight).
     *     @var string $cpusetcpus CPUs in which to allow execution (e.g., `0-3`, `0,1`).
     *     @var int $cpuperiod The length of a CPU period in microseconds.
     *     @var int $cpuquota Microseconds of CPU time that the container can get in a CPU period.
     *     @var string $buildargs JSON map of string pairs for build-time variables. Users pass these values at build-time. Docker uses the buildargs as the environment context for commands run via the `Dockerfile` RUN instruction, or for variable expansion in other `Dockerfile` instructions. This is not meant for passing secret values.

     *     @var int $shmsize Size of `/dev/shm` in bytes. The size must be greater than 0. If omitted the system uses 64MB.
     *     @var bool $squash Squash the resulting images layers into a single layer. *(Experimental release only.)*
     *     @var string $labels Arbitrary key/value labels to set on the image, as a JSON map of string pairs.
     *     @var string $networkmode Sets the networking mode for the run commands during build. Supported
     *     @var string $platform Platform in the format os[/arch[/variant]]
     *     @var string $target Target build stage
     *     @var string $outputs BuildKit output configuration
     * }
     *
     * @param  array  $headerParameters {
     *
     *     @var string $Content-type
     *     @var string $X-Registry-Config This is a base64-encoded JSON object with auth configurations for multiple registries that a build may refer to.

     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageBuildBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageBuildInternalServerErrorException
     */
    public function imageBuild($requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ImageBuild($requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var int $keep-storage Amount of disk space in bytes to keep for cache
     *     @var bool $all Remove all types of build cache
     *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\BuildPrunePostResponse200|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\BuildPruneInternalServerErrorException
     */
    public function buildPrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\BuildPrune($queryParameters), $fetch);
    }

    /**
     * Create an image by either pulling it from a registry or importing it.
     *
     * @param  array  $queryParameters {
     *
     *     @var string $fromImage Name of the image to pull. The name may include a tag or digest. This parameter may only be used when pulling an image. The pull is cancelled if the HTTP connection is closed.
     *     @var string $fromSrc Source to import. The value may be a URL from which the image can be retrieved or `-` to read the image from the request body. This parameter may only be used when importing an image.
     *     @var string $repo Repository name given to an image when it is imported. The repo may include a tag. This parameter may only be used when importing an image.
     *     @var string $tag Tag or digest. If empty when pulling an image, this causes all tags for the given image to be pulled.
     *     @var string $message Set commit message for imported image.
     *     @var array $changes Apply `Dockerfile` instructions to the image that is created,
     *     @var string $platform Platform in the format os[/arch[/variant]]
     * }
     *
     * @param  array  $headerParameters {
     *
     *     @var string $X-Registry-Auth A base64url-encoded auth configuration.

     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageCreateNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageCreateInternalServerErrorException
     */
    public function imageCreate(string $requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ImageCreate($requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * Return low-level information about an image.
     *
     * @param  string  $name Image name or id
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ImageInspect|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageInspectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageInspectInternalServerErrorException
     */
    public function imageInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ImageInspect($name), $fetch);
    }

    /**
     * Return parent layers of an image.
     *
     * @param  string  $name Image name or ID
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ImagesNameHistoryGetResponse200Item[]|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageHistoryNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageHistoryInternalServerErrorException
     */
    public function imageHistory(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ImageHistory($name), $fetch);
    }

    /**
     * Push an image to a registry.

    If you wish to push an image on to a private registry, that image must
    already have a tag which references the registry. For example,
    `registry.example.com/myimage:latest`.

    The push is cancelled if the HTTP connection is closed.

     *
     * @param  string  $name Image name or ID.
     * @param  array  $queryParameters {
     *
     *     @var string $tag The tag to associate with the image on the registry.
     * }
     *
     * @param  array  $headerParameters {
     *
     *     @var string $X-Registry-Auth A base64url-encoded auth configuration.

     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImagePushNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImagePushInternalServerErrorException
     */
    public function imagePush(string $name, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ImagePush($name, $queryParameters, $headerParameters, $accept), $fetch);
    }

    /**
     * Tag an image so that it becomes part of a repository.
     *
     * @param  string  $name Image name or ID to tag.
     * @param  array  $queryParameters {
     *
     *     @var string $repo The repository to tag in. For example, `someuser/someimage`.
     *     @var string $tag The name of the new tag.
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageTagBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageTagNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageTagConflictException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageTagInternalServerErrorException
     */
    public function imageTag(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ImageTag($name, $queryParameters, $accept), $fetch);
    }

    /**
     * Remove an image, along with any untagged parent images that were
    referenced by that image.

    Images can't be removed if they have descendant images, are being
    used by a running container or are being used by a build.

     *
     * @param  string  $name Image name or ID
     * @param  array  $queryParameters {
     *
     *     @var bool $force Remove the image even if it is being used by stopped containers or has other tags
     *     @var bool $noprune Do not delete untagged parent images
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ImageDeleteResponseItem[]|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageDeleteNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageDeleteConflictException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageDeleteInternalServerErrorException
     */
    public function imageDelete(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ImageDelete($name, $queryParameters), $fetch);
    }

    /**
     * Search for an image on Docker Hub.
     *
     * @param  array  $queryParameters {
     *
     *     @var string $term Term to search
     *     @var int $limit Maximum number of results to return
     *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to process on the images list. Available filters:

     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ImagesSearchGetResponse200Item[]|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageSearchInternalServerErrorException
     */
    public function imageSearch(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ImageSearch($queryParameters), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`). Available filters:

    - `dangling=<boolean>` When set to `true` (or `1`), prune only
      unused *and* untagged images. When set to `false`
     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ImagesPrunePostResponse200|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImagePruneInternalServerErrorException
     */
    public function imagePrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ImagePrune($queryParameters), $fetch);
    }

    /**
     * Validate credentials for a registry and, if available, get an identity
    token for accessing the registry without password.

     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\AuthPostResponse200|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SystemAuthUnauthorizedException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SystemAuthInternalServerErrorException
     */
    public function systemAuth(Model\AuthConfig $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SystemAuth($requestBody), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\SystemInfo|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SystemInfoInternalServerErrorException
     */
    public function systemInfo(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SystemInfo(), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\SystemVersion|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SystemVersionInternalServerErrorException
     */
    public function systemVersion(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SystemVersion(), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function systemPing(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SystemPing(), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function systemPingHead(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SystemPingHead(), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var string $container The ID or name of the container to commit
     *     @var string $repo Repository name for the created image
     *     @var string $tag Tag name for the create image
     *     @var string $comment Commit message
     *     @var string $author Author of the image (e.g., `John Hannibal Smith <hannibal@a-team.com>`)
     *     @var bool $pause Whether to pause the container before committing
     *     @var string $changes `Dockerfile` instructions to apply while committing
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\IdResponse|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageCommitNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageCommitInternalServerErrorException
     */
    public function imageCommit(Model\ContainerConfig $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ImageCommit($requestBody, $queryParameters), $fetch);
    }

    /**
     * Stream real-time events from the server.

    Various objects within Docker report events when something happens to them.

    Containers report these events: `attach`, `commit`, `copy`, `create`, `destroy`, `detach`, `die`, `exec_create`, `exec_detach`, `exec_start`, `exec_die`, `export`, `health_status`, `kill`, `oom`, `pause`, `rename`, `resize`, `restart`, `start`, `stop`, `top`, `unpause`, `update`, and `prune`

    Images report these events: `delete`, `import`, `load`, `pull`, `push`, `save`, `tag`, `untag`, and `prune`

    Volumes report these events: `create`, `mount`, `unmount`, `destroy`, and `prune`

    Networks report these events: `create`, `connect`, `disconnect`, `destroy`, `update`, `remove`, and `prune`

    The Docker daemon reports these events: `reload`

    Services report these events: `create`, `update`, and `remove`

    Nodes report these events: `create`, `update`, and `remove`

    Secrets report these events: `create`, `update`, and `remove`

    Configs report these events: `create`, `update`, and `remove`

    The Builder reports `prune` events

     *
     * @param  array  $queryParameters {
     *
     *     @var string $since Show events created since this timestamp then stream new events.
     *     @var string $until Show events created until this timestamp then stop streaming.
     *     @var string $filters A JSON encoded value of filters (a `map[string][]string`) to process on the event list. Available filters:

     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\EventMessage|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SystemEventsBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SystemEventsInternalServerErrorException
     */
    public function systemEvents(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SystemEvents($queryParameters), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Mdshack\Docker\API\v1_41\Model\SystemDfGetJsonResponse200|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SystemDataUsageInternalServerErrorException
     */
    public function systemDataUsage(string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SystemDataUsage($accept), $fetch);
    }

    /**
     * Get a tarball containing all images and metadata for a repository.

    If `name` is a specific name and tag (e.g. `ubuntu:latest`), then only that image (and its parents) are returned. If `name` is an image ID, similarly only that image (and its parents) are returned, but with the exclusion of the `repositories` file in the tarball, as there were no image names referenced.

    ### Image tarball format

    An image tarball contains one directory per image layer (named using its long ID), each containing these files:

    - `VERSION`: currently `1.0` - the file format version
    - `json`: detailed layer information, similar to `docker inspect layer_id`
    - `layer.tar`: A tarfile containing the filesystem changes in this layer

    The `layer.tar` file contains `aufs` style `.wh..wh.aufs` files and directories for storing attribute changes and deletions.

    If the tarball defines a repository, the tarball should also include a `repositories` file at the root that contains a list of repository and tag names mapped to layer IDs.

    ```json
    {
     "hello-world": {
       "latest": "565a9d68a73f6706862bfe8409a7f659776d4d60a8d096eb4a3cbce6999cc2a1"
     }
    }
    ```

     *
     * @param  string  $name Image name or ID
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function imageGet(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ImageGet($name), $fetch);
    }

    /**
     * Get a tarball containing all images and metadata for several image
    repositories.

    For each value of the `names` parameter: if it is a specific name and
    tag (e.g. `ubuntu:latest`), then only that image (and its parents) are
    returned; if it is an image ID, similarly only that image (and its parents)
    are returned and there would be no names referenced in the 'repositories'
    file for this image ID.

    For details on the format, see the [export image endpoint](#operation/ImageGet).

     *
     * @param  array  $queryParameters {
     *
     *     @var array $names Image names to filter by
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function imageGetAll(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ImageGetAll($queryParameters), $fetch);
    }

    /**
     * Load a set of images and tags into a repository.

    For details on the format, see the [export image endpoint](#operation/ImageGet).

     *
     * @param  null|string|resource|\Psr\Http\Message\StreamInterface  $requestBody
     * @param  array  $queryParameters {
     *
     *     @var bool $quiet Suppress progress details during load.
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ImageLoadInternalServerErrorException
     */
    public function imageLoad($requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ImageLoad($requestBody, $queryParameters), $fetch);
    }

    /**
     * Run a command inside a running container.
     *
     * @param  string  $id ID or name of container
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\IdResponse|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerExecNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerExecConflictException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ContainerExecInternalServerErrorException
     */
    public function containerExec(string $id, Model\ContainersIdExecPostBody $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ContainerExec($id, $requestBody), $fetch);
    }

    /**
     * Starts a previously set up exec instance. If detach is true, this endpoint
    returns immediately after starting the command. Otherwise, it sets up an
    interactive session with the command.

     *
     * @param  string  $id Exec instance ID
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function execStart(string $id, Model\ExecIdStartPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ExecStart($id, $requestBody), $fetch);
    }

    /**
     * Resize the TTY session used by an exec instance. This endpoint only works
    if `tty` was specified as part of creating and starting the exec instance.

     *
     * @param  string  $id Exec instance ID
     * @param  array  $queryParameters {
     *
     *     @var int $h Height of the TTY session in characters
     *     @var int $w Width of the TTY session in characters
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ExecResizeBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ExecResizeNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ExecResizeInternalServerErrorException
     */
    public function execResize(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ExecResize($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Return low-level information about an exec instance.
     *
     * @param  string  $id Exec instance ID
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ExecIdJsonGetResponse200|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ExecInspectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ExecInspectInternalServerErrorException
     */
    public function execInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ExecInspect($id), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var string $filters JSON encoded value of the filters (a `map[string][]string`) to
     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\VolumeListResponse|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\VolumeListInternalServerErrorException
     */
    public function volumeList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\VolumeList($queryParameters), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\Volume|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\VolumeCreateInternalServerErrorException
     */
    public function volumeCreate(Model\VolumeCreateOptions $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\VolumeCreate($requestBody), $fetch);
    }

    /**
     * Instruct the driver to remove the volume.
     *
     * @param  string  $name Volume name or ID
     * @param  array  $queryParameters {
     *
     *     @var bool $force Force the removal of the volume
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\VolumeDeleteNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\VolumeDeleteConflictException
     * @throws \Mdshack\Docker\API\v1_41\Exception\VolumeDeleteInternalServerErrorException
     */
    public function volumeDelete(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\VolumeDelete($name, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  string  $name Volume name or ID
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\Volume|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\VolumeInspectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\VolumeInspectInternalServerErrorException
     */
    public function volumeInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\VolumeInspect($name), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`).

     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\VolumesPrunePostResponse200|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\VolumePruneInternalServerErrorException
     */
    public function volumePrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\VolumePrune($queryParameters), $fetch);
    }

    /**
     * Returns a list of networks. For details on the format, see the
    [network inspect endpoint](#operation/NetworkInspect).

    Note that it uses a different, smaller representation of a network than
    inspecting a single network. For example, the list of containers attached
    to the network is not propagated in API versions 1.28 and up.

     *
     * @param  array  $queryParameters {
     *
     *     @var string $filters JSON encoded value of the filters (a `map[string][]string`) to process
     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\Network[]|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkListInternalServerErrorException
     */
    public function networkList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\NetworkList($queryParameters), $fetch);
    }

    /**
     * @param  string  $id Network ID or name
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkDeleteForbiddenException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkDeleteNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkDeleteInternalServerErrorException
     */
    public function networkDelete(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\NetworkDelete($id, $accept), $fetch);
    }

    /**
     * @param  string  $id Network ID or name
     * @param  array  $queryParameters {
     *
     *     @var bool $verbose Detailed inspect output for troubleshooting
     *     @var string $scope Filter the network by scope (swarm, global, or local)
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\Network|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkInspectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkInspectInternalServerErrorException
     */
    public function networkInspect(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\NetworkInspect($id, $queryParameters), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\NetworksCreatePostResponse201|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkCreateForbiddenException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkCreateNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkCreateInternalServerErrorException
     */
    public function networkCreate(Model\NetworksCreatePostBody $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\NetworkCreate($requestBody), $fetch);
    }

    /**
     * @param  string  $id Network ID or name
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkConnectForbiddenException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkConnectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkConnectInternalServerErrorException
     */
    public function networkConnect(string $id, Model\NetworksIdConnectPostBody $requestBody, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\NetworkConnect($id, $requestBody, $accept), $fetch);
    }

    /**
     * @param  string  $id Network ID or name
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkDisconnectForbiddenException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkDisconnectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkDisconnectInternalServerErrorException
     */
    public function networkDisconnect(string $id, Model\NetworksIdDisconnectPostBody $requestBody, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\NetworkDisconnect($id, $requestBody, $accept), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`).

     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\NetworksPrunePostResponse200|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\NetworkPruneInternalServerErrorException
     */
    public function networkPrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\NetworkPrune($queryParameters), $fetch);
    }

    /**
     * Returns information about installed plugins.
     *
     * @param  array  $queryParameters {
     *
     *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\Plugin[]|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginListInternalServerErrorException
     */
    public function pluginList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\PluginList($queryParameters), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var string $remote The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Mdshack\Docker\API\v1_41\Model\PluginPrivilege[]|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\GetPluginPrivilegesInternalServerErrorException
     */
    public function getPluginPrivileges(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\GetPluginPrivileges($queryParameters, $accept), $fetch);
    }

    /**
     * Pulls and installs a plugin. After the plugin is installed, it can be
    enabled using the [`POST /plugins/{name}/enable` endpoint](#operation/PostPluginsEnable).

     *
     * @param  null|\Mdshack\Docker\API\v1_41\Model\PluginPrivilege[]  $requestBody
     * @param  array  $queryParameters {
     *
     *     @var string $remote Remote reference for plugin to install.

     *     @var string $name Local name for the pulled plugin.

    The `:latest` tag is optional, and is used as the default if omitted.

     * }
     *
     * @param  array  $headerParameters {
     *
     *     @var string $X-Registry-Auth A base64url-encoded auth configuration to use when pulling a plugin
     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginPullInternalServerErrorException
     */
    public function pluginPull(array $requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\PluginPull($requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param  string  $name The name of the plugin. The `:latest` tag is optional, and is the
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Mdshack\Docker\API\v1_41\Model\Plugin|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginInspectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginInspectInternalServerErrorException
     */
    public function pluginInspect(string $name, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\PluginInspect($name, $accept), $fetch);
    }

    /**
     * @param  string  $name The name of the plugin. The `:latest` tag is optional, and is the
     * @param  array  $queryParameters {
     *
     *     @var bool $force Disable the plugin before removing. This may result in issues if the
    plugin is in use by a container.

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Mdshack\Docker\API\v1_41\Model\Plugin|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginDeleteNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginDeleteInternalServerErrorException
     */
    public function pluginDelete(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\PluginDelete($name, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  string  $name The name of the plugin. The `:latest` tag is optional, and is the
     * @param  array  $queryParameters {
     *
     *     @var int $timeout Set the HTTP client timeout (in seconds)
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginEnableNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginEnableInternalServerErrorException
     */
    public function pluginEnable(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\PluginEnable($name, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  string  $name The name of the plugin. The `:latest` tag is optional, and is the
     * @param  array  $queryParameters {
     *
     *     @var bool $force Force disable a plugin even if still in use.

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginDisableNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginDisableInternalServerErrorException
     */
    public function pluginDisable(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\PluginDisable($name, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  string  $name The name of the plugin. The `:latest` tag is optional, and is the
     * @param  null|\Mdshack\Docker\API\v1_41\Model\PluginPrivilege[]  $requestBody
     * @param  array  $queryParameters {
     *
     *     @var string $remote Remote reference to upgrade to.

    The `:latest` tag is optional, and is used as the default if omitted.

     * }
     *
     * @param  array  $headerParameters {
     *
     *     @var string $X-Registry-Auth A base64url-encoded auth configuration to use when pulling a plugin
     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginUpgradeNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginUpgradeInternalServerErrorException
     */
    public function pluginUpgrade(string $name, array $requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\PluginUpgrade($name, $requestBody, $queryParameters, $headerParameters, $accept), $fetch);
    }

    /**
     * @param  null|string|resource|\Psr\Http\Message\StreamInterface  $requestBody
     * @param  array  $queryParameters {
     *
     *     @var string $name The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginCreateInternalServerErrorException
     */
    public function pluginCreate($requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\PluginCreate($requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * Push a plugin to the registry.

     *
     * @param  string  $name The name of the plugin. The `:latest` tag is optional, and is the
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginPushNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginPushInternalServerErrorException
     */
    public function pluginPush(string $name, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\PluginPush($name, $accept), $fetch);
    }

    /**
     * @param  string  $name The name of the plugin. The `:latest` tag is optional, and is the
     * @param  null|array[]  $requestBody
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginSetNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\PluginSetInternalServerErrorException
     */
    public function pluginSet(string $name, array $requestBody = null, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\PluginSet($name, $requestBody, $accept), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var string $filters Filters to process on the nodes list, encoded as JSON (a `map[string][]string`).

     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Mdshack\Docker\API\v1_41\Model\Node[]|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\NodeListInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NodeListServiceUnavailableException
     */
    public function nodeList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\NodeList($queryParameters, $accept), $fetch);
    }

    /**
     * @param  string  $id The ID or name of the node
     * @param  array  $queryParameters {
     *
     *     @var bool $force Force remove a node from the swarm
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\NodeDeleteNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NodeDeleteInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NodeDeleteServiceUnavailableException
     */
    public function nodeDelete(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\NodeDelete($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  string  $id The ID or name of the node
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Mdshack\Docker\API\v1_41\Model\Node|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\NodeInspectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NodeInspectInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NodeInspectServiceUnavailableException
     */
    public function nodeInspect(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\NodeInspect($id, $accept), $fetch);
    }

    /**
     * @param  string  $id The ID of the node
     * @param  array  $queryParameters {
     *
     *     @var int $version The version number of the node object being updated. This is required
    to avoid conflicting writes.

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\NodeUpdateBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NodeUpdateNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NodeUpdateInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\NodeUpdateServiceUnavailableException
     */
    public function nodeUpdate(string $id, Model\NodeSpec $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\NodeUpdate($id, $requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Mdshack\Docker\API\v1_41\Model\Swarm|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmInspectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmInspectInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmInspectServiceUnavailableException
     */
    public function swarmInspect(string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SwarmInspect($accept), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmInitBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmInitInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmInitServiceUnavailableException
     */
    public function swarmInit(Model\SwarmInitPostBody $requestBody, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SwarmInit($requestBody, $accept), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmJoinBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmJoinInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmJoinServiceUnavailableException
     */
    public function swarmJoin(Model\SwarmJoinPostBody $requestBody, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SwarmJoin($requestBody, $accept), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var bool $force Force leave swarm, even if this is the last manager or that it will
    break the cluster.

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmLeaveInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmLeaveServiceUnavailableException
     */
    public function swarmLeave(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SwarmLeave($queryParameters, $accept), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var int $version The version number of the swarm object being updated. This is
     *     @var bool $rotateWorkerToken Rotate the worker join token.
     *     @var bool $rotateManagerToken Rotate the manager join token.
     *     @var bool $rotateManagerUnlockKey Rotate the manager unlock key.
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmUpdateBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmUpdateInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmUpdateServiceUnavailableException
     */
    public function swarmUpdate(Model\SwarmSpec $requestBody, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SwarmUpdate($requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Mdshack\Docker\API\v1_41\Model\SwarmUnlockkeyGetJsonResponse200|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmUnlockkeyInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmUnlockkeyServiceUnavailableException
     */
    public function swarmUnlockkey(string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SwarmUnlockkey($accept), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmUnlockInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SwarmUnlockServiceUnavailableException
     */
    public function swarmUnlock(Model\SwarmUnlockPostBody $requestBody, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SwarmUnlock($requestBody), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     *     @var bool $status Include service status, with count of running and desired tasks.

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Mdshack\Docker\API\v1_41\Model\Service[]|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceListInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceListServiceUnavailableException
     */
    public function serviceList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ServiceList($queryParameters, $accept), $fetch);
    }

    /**
     * @param  array  $headerParameters {
     *
     *     @var string $X-Registry-Auth A base64url-encoded auth configuration for pulling from private
     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ServicesCreatePostResponse201|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceCreateBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceCreateForbiddenException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceCreateConflictException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceCreateInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceCreateServiceUnavailableException
     */
    public function serviceCreate(Model\ServicesCreatePostBody $requestBody, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ServiceCreate($requestBody, $headerParameters), $fetch);
    }

    /**
     * @param  string  $id ID or name of service.
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceDeleteNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceDeleteInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceDeleteServiceUnavailableException
     */
    public function serviceDelete(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ServiceDelete($id, $accept), $fetch);
    }

    /**
     * @param  string  $id ID or name of service.
     * @param  array  $queryParameters {
     *
     *     @var bool $insertDefaults Fill empty fields with default values.
     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Mdshack\Docker\API\v1_41\Model\Service|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceInspectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceInspectInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceInspectServiceUnavailableException
     */
    public function serviceInspect(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ServiceInspect($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  string  $id ID or name of service.
     * @param  array  $queryParameters {
     *
     *     @var int $version The version number of the service object being updated. This is
     *     @var string $registryAuthFrom If the `X-Registry-Auth` header is not specified, this parameter
     *     @var string $rollback Set to this parameter to `previous` to cause a server-side rollback
     * }
     * @param  array  $headerParameters {
     *
     *     @var string $X-Registry-Auth A base64url-encoded auth configuration for pulling from private
     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\ServiceUpdateResponse|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceUpdateBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceUpdateNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceUpdateInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceUpdateServiceUnavailableException
     */
    public function serviceUpdate(string $id, Model\ServicesIdUpdatePostBody $requestBody, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ServiceUpdate($id, $requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * Get `stdout` and `stderr` logs from a service. See also
    [`/containers/{id}/logs`](#operation/ContainerLogs).

     **Note**: This endpoint works only for services with the `local`,
    `json-file` or `journald` logging drivers.

     *
     * @param  string  $id ID or name of the service
     * @param  array  $queryParameters {
     *
     *     @var bool $details Show service context and extra details provided to logs.
     *     @var bool $follow Keep connection after returning logs.
     *     @var bool $stdout Return logs from `stdout`
     *     @var bool $stderr Return logs from `stderr`
     *     @var int $since Only return logs since this time, as a UNIX timestamp
     *     @var bool $timestamps Add timestamps to every log line
     *     @var string $tail Only return this number of log lines from the end of the logs.
    Specify as an integer or `all` to output all log lines.

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceLogsNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceLogsInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ServiceLogsServiceUnavailableException
     */
    public function serviceLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ServiceLogs($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\Task[]|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\TaskListInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\TaskListServiceUnavailableException
     */
    public function taskList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\TaskList($queryParameters), $fetch);
    }

    /**
     * @param  string  $id ID of the task
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\Task|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\TaskInspectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\TaskInspectInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\TaskInspectServiceUnavailableException
     */
    public function taskInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\TaskInspect($id), $fetch);
    }

    /**
     * Get `stdout` and `stderr` logs from a task.
    See also [`/containers/{id}/logs`](#operation/ContainerLogs).

     **Note**: This endpoint works only for services with the `local`,
    `json-file` or `journald` logging drivers.

     *
     * @param  string  $id ID of the task
     * @param  array  $queryParameters {
     *
     *     @var bool $details Show task context and extra details provided to logs.
     *     @var bool $follow Keep connection after returning logs.
     *     @var bool $stdout Return logs from `stdout`
     *     @var bool $stderr Return logs from `stderr`
     *     @var int $since Only return logs since this time, as a UNIX timestamp
     *     @var bool $timestamps Add timestamps to every log line
     *     @var string $tail Only return this number of log lines from the end of the logs.
    Specify as an integer or `all` to output all log lines.

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\TaskLogsNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\TaskLogsInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\TaskLogsServiceUnavailableException
     */
    public function taskLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\TaskLogs($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\Secret[]|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretListInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretListServiceUnavailableException
     */
    public function secretList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SecretList($queryParameters), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\IdResponse|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretCreateConflictException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretCreateInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretCreateServiceUnavailableException
     */
    public function secretCreate(Model\SecretsCreatePostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SecretCreate($requestBody), $fetch);
    }

    /**
     * @param  string  $id ID of the secret
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretDeleteNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretDeleteInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretDeleteServiceUnavailableException
     */
    public function secretDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SecretDelete($id), $fetch);
    }

    /**
     * @param  string  $id ID of the secret
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\Secret|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretInspectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretInspectInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretInspectServiceUnavailableException
     */
    public function secretInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SecretInspect($id), $fetch);
    }

    /**
     * @param  string  $id The ID or name of the secret
     * @param  array  $queryParameters {
     *
     *     @var int $version The version number of the secret object being updated. This is
    required to avoid conflicting writes.

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretUpdateBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretUpdateNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretUpdateInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\SecretUpdateServiceUnavailableException
     */
    public function secretUpdate(string $id, Model\SecretSpec $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\SecretUpdate($id, $requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * @param  array  $queryParameters {
     *
     *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     * }
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\Config[]|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigListInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigListServiceUnavailableException
     */
    public function configList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ConfigList($queryParameters), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\IdResponse|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigCreateConflictException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigCreateInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigCreateServiceUnavailableException
     */
    public function configCreate(Model\ConfigsCreatePostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ConfigCreate($requestBody), $fetch);
    }

    /**
     * @param  string  $id ID of the config
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigDeleteNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigDeleteInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigDeleteServiceUnavailableException
     */
    public function configDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ConfigDelete($id), $fetch);
    }

    /**
     * @param  string  $id ID of the config
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\Config|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigInspectNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigInspectInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigInspectServiceUnavailableException
     */
    public function configInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ConfigInspect($id), $fetch);
    }

    /**
     * @param  string  $id The ID or name of the config
     * @param  array  $queryParameters {
     *
     *     @var int $version The version number of the config object being updated. This is
    required to avoid conflicting writes.

     * }
     *
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @param  array  $accept Accept content header application/json|text/plain
     * @return null|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigUpdateBadRequestException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigUpdateNotFoundException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigUpdateInternalServerErrorException
     * @throws \Mdshack\Docker\API\v1_41\Exception\ConfigUpdateServiceUnavailableException
     */
    public function configUpdate(string $id, Model\ConfigSpec $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\ConfigUpdate($id, $requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * Return image digest and platform information by contacting the registry.
     *
     * @param  string  $name Image name or id
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Mdshack\Docker\API\v1_41\Model\DistributionInspect|\Psr\Http\Message\ResponseInterface
     *
     * @throws \Mdshack\Docker\API\v1_41\Exception\DistributionInspectUnauthorizedException
     * @throws \Mdshack\Docker\API\v1_41\Exception\DistributionInspectInternalServerErrorException
     */
    public function distributionInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\DistributionInspect($name), $fetch);
    }

    /**
     * @param  string  $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Psr\Http\Message\ResponseInterface
     */
    public function session(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Mdshack\Docker\API\v1_41\Endpoint\Session(), $fetch);
    }

    public static function create($httpClient = null, array $additionalPlugins = [], array $additionalNormalizers = [])
    {
        if ($httpClient === null) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = [];
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUriFactory()->createUri('/v1.41');
            $plugins[] = new \Http\Client\Common\Plugin\AddPathPlugin($uri);
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = [new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \Mdshack\Docker\API\v1_41\Normalizer\JaneObjectNormalizer()];
        if (count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, [new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(['json_decode_associative' => true]))]);

        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
