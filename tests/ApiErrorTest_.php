<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\Attributes\DataProvider;
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

class ApiErrorTest extends AbstractTest
{
    public function testApiErrorNoResults()
    {
        $this->mockClient->addResponse(
            new Response(
                status: 200,
                body: MockResponse::ERROR_NO_RESULTS
            )
        );

        $this->expectException(NoResultsFoundException::class);
        $this->givenApi()->continents()->getById(1);
    }

    #[DataProvider('provideApiErrorPropertyCodeData')]
    public function testApiErrorPropertyCode(int $code, string $expectedException)
    {
        $this->mockClient->addResponse(
            new Response(
                status: 422,
                body: MockResponse::buildResponse(MockResponse::ERROR_PROPERTY_CODE, [
                    'code' => $code
                ])
            )
        );

        $this->expectException($expectedException);
        $this->givenApi()->continents()->getById(1);
    }

    public static function provideApiErrorPropertyCodeData(): \Generator
    {
        yield 'include not allowed exception' => [5000, IncludeNotAllowedException::class];
        yield 'include not found exception' => [5001, IncludeNotFoundException::class];
        yield 'insufficient includes exception' => [5002, InsufficientIncludesException::class];
        yield 'pagination limit exception' => [5003, PaginationLimitException::class];
        yield 'query complexity exception' => [5004, QueryComplexityException::class];
        yield 'rate limit exception' => [5005, RateLimitException::class];
        yield 'invalid query parameter exception' => [5006, InvalidQueryParameterException::class];
        yield 'insufficient resources exception' => [5007, InsufficientResourcesException::class];
        yield 'include depth exception' => [5008, IncludeDepthException::class];
        yield 'filter not applicable exception' => [5010, FilterNotApplicableException::class];
        yield 'include not available exception' => [5013, IncludeNotAvailableException::class];
        yield 'unexpected error exception' => [9999, UnexpectedErrorException::class];
    }

    #[DataProvider('provideApiErrorStatusCodeData')]
    public function testApiErrorStatusCode(int $statusCode, string $expectedException)
    {
        $this->mockClient->addResponse(
            new Response(
                status: $statusCode,
                body: MockResponse::ERROR_STATUS_CODE
            )
        );

        $this->expectException($expectedException);
        $this->givenApi()->continents()->getById(1);
    }

    public static function provideApiErrorStatusCodeData(): \Generator
    {
        yield 'bad request exception' => [400, BadRequestException::class];
        yield 'unauthorized exception' => [401, UnauthorizedException::class];
        yield 'forbidden exception' => [403, ForbiddenException::class];
        yield 'not found exception' => [404, NotFoundException::class];
        yield 'too many requests exception' => [429, TooManyRequestsException::class];
        yield 'unexpected error exception' => [500, UnexpectedErrorException::class];
    }
}