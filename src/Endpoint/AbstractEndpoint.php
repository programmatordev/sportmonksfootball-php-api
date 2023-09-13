<?php

namespace ProgrammatorDev\SportMonksFootball\Endpoint;

use Http\Client\Common\Plugin\CachePlugin;
use Http\Client\Common\Plugin\LoggerPlugin;
use Http\Client\Exception;
use ProgrammatorDev\SportMonksFootball\Config;
use ProgrammatorDev\SportMonksFootball\Endpoint\Util\CacheTtlTrait;
use ProgrammatorDev\SportMonksFootball\Entity\Response\Error;
use ProgrammatorDev\SportMonksFootball\Exception\ApiErrorException;
use ProgrammatorDev\SportMonksFootball\Exception\BadRequestException;
use ProgrammatorDev\SportMonksFootball\Exception\ForbiddenException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeDepthException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeNotAllowedException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeNotAvailableException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeNotFoundException;
use ProgrammatorDev\SportMonksFootball\Exception\FilterNotApplicableException;
use ProgrammatorDev\SportMonksFootball\Exception\InsufficientIncludesException;
use ProgrammatorDev\SportMonksFootball\Exception\InsufficientResourcesException;
use ProgrammatorDev\SportMonksFootball\Exception\InvalidQueryParameterException;
use ProgrammatorDev\SportMonksFootball\Exception\NoResultsFoundException;
use ProgrammatorDev\SportMonksFootball\Exception\NotFoundException;
use ProgrammatorDev\SportMonksFootball\Exception\PaginationLimitException;
use ProgrammatorDev\SportMonksFootball\Exception\QueryComplexityException;
use ProgrammatorDev\SportMonksFootball\Exception\RateLimitException;
use ProgrammatorDev\SportMonksFootball\Exception\TooManyRequestsException;
use ProgrammatorDev\SportMonksFootball\Exception\UnauthorizedException;
use ProgrammatorDev\SportMonksFootball\Exception\UnexpectedErrorException;
use ProgrammatorDev\SportMonksFootball\HttpClient\HttpClientBuilder;
use ProgrammatorDev\SportMonksFootball\HttpClient\Listener\LoggerCacheListener;
use ProgrammatorDev\SportMonksFootball\HttpClient\ResponseMediator;
use ProgrammatorDev\SportMonksFootball\SportMonksFootball;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Log\LoggerInterface;

class AbstractEndpoint
{
    use CacheTtlTrait;

    protected const PAGINATION_PER_PAGE = 25;

    private Config $config;

    protected string $timezone;

    protected string $language;

    protected int $cacheTtl = 60; // 1 minute

    private HttpClientBuilder $httpClientBuilder;

    private ?CacheItemPoolInterface $cache;

    private ?LoggerInterface $logger;

    public function __construct(SportMonksFootball $api)
    {
        $this->config = $api->config();

        $this->timezone = $this->config->getTimezone();
        $this->language = $this->config->getLanguage();
        $this->httpClientBuilder = $this->config->getHttpClientBuilder();
        $this->cache = $this->config->getCache();
        $this->logger = $this->config->getLogger();
    }

    /**
     * @throws Exception
     * @throws ApiErrorException
     */
    protected function sendRequest(
        string $method,
        string $path,
        array $query = [],
        array $headers = [],
        StreamInterface|string $body = null
    ): array
    {
        $this->configurePlugins();

        $response = $this->httpClientBuilder->getHttpClient()->send(
            $method,
            $this->buildUrl($path, $query),
            $headers,
            $body
        );

        // Get response contents once
        $data = ResponseMediator::toArray($response);
        // Check if response is an error
        $this->checkErrorResponse($response, $data);

        return $data;
    }

    private function configurePlugins(): void
    {
        // Plugin order is important:
        // The CachePlugin should come first, otherwise the LoggerPlugin will log requests even if they are cached
        if ($this->cache !== null) {
            $this->httpClientBuilder->addPlugin(
                new CachePlugin($this->cache, $this->httpClientBuilder->getStreamFactory(), [
                    'default_ttl' => $this->cacheTtl,
                    'cache_lifetime' => 0,
                    'cache_listeners' => ($this->logger !== null) ? [new LoggerCacheListener($this->logger)] : [],
                    // Removed default no-cache/private directives to cache responses
                    'respect_response_cache_directives' => ['max-age']
                ])
            );
        }

        if ($this->logger !== null) {
            $this->httpClientBuilder->addPlugin(
                new LoggerPlugin($this->logger)
            );
        }
    }

    /**
     * @throws ApiErrorException
     */
    private function checkErrorResponse(ResponseInterface $response, array $data): void
    {
        $statusCode = $response->getStatusCode();
        $message = $data['message'] ?? null;
        $code = $data['code'] ?? null;
        $link = $data['link'] ?? null;

        // An error may occur with a misleading 200 status code:
        // If there is a "message" property on the response, it means it is returning an error
        if ($statusCode >= 200 && $statusCode <= 299 && $message !== null) {
            throw new NoResultsFoundException(new Error($data));
        }

        if ($statusCode >= 400) {
            // Filter error by the provided "code" property (ignores status codes as they may be misleading)
            // https://docs.sportmonks.com/football/api/error-codes/include-exceptions
            // https://docs.sportmonks.com/football/api/error-codes/filtering-and-complexity-exceptions
            // https://docs.sportmonks.com/football/api/error-codes/other-exceptions
            if ($code !== null) {
                match ($code) {
                    5000 => throw new IncludeNotAllowedException($message, $code, $link),
                    5001 => throw new IncludeNotFoundException($message, $code, $link),
                    5002 => throw new InsufficientIncludesException($message, $code, $link),
                    5003 => throw new PaginationLimitException($message, $code, $link),
                    5004 => throw new QueryComplexityException($message, $code, $link),
                    5005 => throw new RateLimitException($message, $code, $link),
                    5006 => throw new InvalidQueryParameterException($message, $code, $link),
                    5007 => throw new InsufficientResourcesException($message, $code, $link),
                    5008 => throw new IncludeDepthException($message, $code, $link),
                    5010 => throw new FilterNotApplicableException($message, $code, $link),
                    5013 => throw new IncludeNotAvailableException($message, $code, $link),
                    default => throw new UnexpectedErrorException($message, $code, $link)
                };
            }

            // Filter error by status code
            // https://docs.sportmonks.com/football/api/error-codes
            match ($statusCode) {
                400 => throw new BadRequestException($message, $statusCode, $link),
                401 => throw new UnauthorizedException($message, $statusCode, $link),
                403 => throw new ForbiddenException($message, $statusCode, $link),
                404 => throw new NotFoundException($message, $statusCode, $link),
                429 => throw new TooManyRequestsException($message, $statusCode, $link),
                default => throw new UnexpectedErrorException($message, $statusCode, $link)
            };
        }
    }

    protected function buildPath(string $path, array $parameters): string
    {
        foreach ($parameters as $parameter => $value) {
            $path = \str_replace(\sprintf("{%s}", $parameter), $value, $path);
        }

        return $path;
    }

    private function buildSelectQuery(array $select): string
    {
        // from: ['id', 'name']
        // to: id;name
        return \implode(';', $select);
    }

    private function buildIncludeQuery(array $include): string
    {
        // from: ['countries', 'regions']
        // to: countries;regions
        return \implode(';', $include);
    }

    private function buildFiltersQuery(array $filters): string
    {
        // from: ['idAfter' => 100, 'regionCountries' => '200,300']
        // to: idAfter:100;regionCountries:200,300
        return \str_replace('=', ':', \http_build_query(data: $filters, arg_separator: ';'));
    }

    private function buildUrl(string $path, array $query = []): string
    {
        $query['api_token'] = $this->config->getApplicationKey(); // For authentication
        $query['timezone'] = $this->timezone;
        $query['locale'] = $this->language;

        if (!empty($this->select)) {
            $query['select'] = $this->buildSelectQuery($this->select);
        }

        if (!empty($this->include)) {
            $query['include'] = $this->buildIncludeQuery($this->include);
        }

        if (!empty($this->filters)) {
            // Removes "per_page" query parameter if "populate" filter exists,
            // otherwise it would be ignored
            if (isset($this->filters['populate'])) {
                unset($query['per_page']);
            }

            $query['filters'] = $this->buildFiltersQuery($this->filters);
        }

        return \sprintf('%s%s?%s', $this->config->getBaseUrl(), $path, \http_build_query($query));
    }
}