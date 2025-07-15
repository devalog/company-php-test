<?php

namespace Devin;

use Devin\Imdb\ImdbClient;
use GuzzleHttp\ClientInterface;
use Devin\Core\Client\RawClient;

class DevinClient
{
    /**
     * @var ImdbClient $imdb
     */
    public ImdbClient $imdb;

    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Devin',
            'X-Fern-SDK-Version' => '0.0.2',
            'User-Agent' => 'devin/devin/0.0.2',
        ];

        $this->options = $options ?? [];
        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->imdb = new ImdbClient($this->client, $this->options);
    }
}
