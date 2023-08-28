<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\HttpClient\HttpClientBuilder;
use ProgrammatorDev\SportMonksFootball\HttpClient\ResponseMediator;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

class AbstractEndpoint
{
    private Config $config;

    private HttpClientBuilder $httpClientBuilder;

    public function __construct(protected SportMonksFootball $api)
    {
        $this->config = $this->api->config;

        $this->httpClientBuilder = $this->config->getHttpClientBuilder();
    }

    /**
     * @throws Exception
     */
    protected function sendRequest(
        string $method,
        UriInterface|string $baseUrl,
        array $query = [],
        array $headers = [],
        StreamInterface|string $body = null
    ): array
    {
        $response = $this->httpClientBuilder->getHttpClient()->send(
            $method,
            $this->buildUrl($baseUrl, $query),
            $headers,
            $body
        );

        return ResponseMediator::toArray($response);
    }

    protected function formatUrlTemplate(string $url, array $parameters): string
    {
        foreach ($parameters as $parameter => $value) {
            $url = \str_replace(\sprintf("{%s}", $parameter), $value, $url);
        }

        return $url;
    }

    private function buildUrl(UriInterface|string $baseUrl, array $query): string
    {
        if ($baseUrl instanceof UriInterface) {
            $baseUrl = (string) $baseUrl;
        }

        // Add application key to all requests
        $query = $query + [
            'api_token' => $this->config->getApplicationKey()
        ];

        return \sprintf('%s?%s', $baseUrl, http_build_query($query));
    }
}