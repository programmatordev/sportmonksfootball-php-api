<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Common\Plugin\CachePlugin;
use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\CacheTtlTrait;
use ProgrammatorDev\SportMonksFootball\HttpClient\HttpClientBuilder;
use ProgrammatorDev\SportMonksFootball\HttpClient\ResponseMediator;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

class AbstractEndpoint
{
    use CacheTtlTrait;

    private Config $config;

    private HttpClientBuilder $httpClientBuilder;

    private ?CacheItemPoolInterface $cache;

    protected int $cacheTtl = 60; // 1 minute

    public function __construct(SportMonksFootball $api)
    {
        $this->config = $api->config();

        $this->httpClientBuilder = $this->config->getHttpClientBuilder();
        $this->cache = $this->config->getCache();
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
        $this->configurePlugins();

        $response = $this->httpClientBuilder->getHttpClient()->send(
            $method,
            $this->buildUrl($baseUrl, $query),
            $headers,
            $body
        );

        return ResponseMediator::toArray($response);
    }

    private function configurePlugins(): void
    {
        if ($this->cache !== null) {
            $this->httpClientBuilder->addPlugin(
                new CachePlugin($this->cache, $this->httpClientBuilder->getStreamFactory(), [
                    'default_ttl' => $this->cacheTtl,
                    'cache_lifetime' => 0,
                    // Removed default no-cache/private directives to cache responses
                    'respect_response_cache_directives' => ['max-age']
                ])
            );
        }
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