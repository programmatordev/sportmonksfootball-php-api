<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\Api\Method;
use ProgrammatorDev\SportMonksFootball\Exception\BadRequestException;
use ProgrammatorDev\SportMonksFootball\Exception\FilterNotApplicableException;
use ProgrammatorDev\SportMonksFootball\Exception\ForbiddenException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeDepthException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeNotAllowedException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeNotAvailableException;
use ProgrammatorDev\SportMonksFootball\Exception\IncludeNotFoundException;
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
use ProgrammatorDev\SportMonksFootball\Resource\Resource;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;

class ResourceTest extends AbstractTest
{
    private Resource $resource;

    protected function setUp(): void
    {
        parent::setUp();

        $this->resource = new class($this->api) extends Resource {
            public function request(): void
            {
                $this->api->request(
                    method: Method::GET,
                    path: '/test'
                );
            }
        };
    }

    public function testApiErrorNoResults(): void
    {
        $this->mockClient->addResponse(new Response(
            status: 200,
            body: MockResponse::ERROR_NO_RESULTS
        ));

        $this->expectException(NoResultsFoundException::class);
        $this->resource->request();
    }

    #[DataProvider(methodName: 'provideApiErrorCodeData')]
    public function testApiErrorCode(int $code, string $exception): void
    {
        $this->mockClient->addResponse(new Response(
            status: 422,
            body: MockResponse::buildResponse(MockResponse::ERROR_PROPERTY_CODE, [
                'code' => $code
            ])
        ));

        $this->expectException($exception);
        $this->resource->request();
    }

    public static function provideApiErrorCodeData(): \Generator
    {
        yield 'include not allowed' => [5000, IncludeNotAllowedException::class];
        yield 'include not found' => [5001, IncludeNotFoundException::class];
        yield 'insufficient includes' => [5002, InsufficientIncludesException::class];
        yield 'pagination limit' => [5003, PaginationLimitException::class];
        yield 'query complexity' => [5004, QueryComplexityException::class];
        yield 'rate limit' => [5005, RateLimitException::class];
        yield 'invalid query parameter' => [5006, InvalidQueryParameterException::class];
        yield 'insufficient resources' => [5007, InsufficientResourcesException::class];
        yield 'include depth' => [5008, IncludeDepthException::class];
        yield 'filter not applicable' => [5010, FilterNotApplicableException::class];
        yield 'include not available' => [5013, IncludeNotAvailableException::class];
        yield 'unexpected error' => [9999, UnexpectedErrorException::class];
    }

    #[DataProvider(methodName: 'provideApiErrorStatusCodeData')]
    public function testApiErrorStatusCode(int $statusCode, string $exception): void
    {
        $this->mockClient->addResponse(new Response(
            status: $statusCode,
            body: MockResponse::ERROR_STATUS_CODE
        ));

        $this->expectException($exception);
        $this->resource->request();
    }

    public static function provideApiErrorStatusCodeData(): \Generator
    {
        yield 'bad request' => [400, BadRequestException::class];
        yield 'unauthorized' => [401, UnauthorizedException::class];
        yield 'forbidden' => [403, ForbiddenException::class];
        yield 'not found' => [404, NotFoundException::class];
        yield 'too many requests' => [429, TooManyRequestsException::class];
        yield 'unexpected error' => [500, UnexpectedErrorException::class];
    }
}