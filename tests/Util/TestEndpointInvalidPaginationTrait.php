<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Util;

use PHPUnit\Framework\Attributes\DataProvider as PhpUnitDataProvider;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use TRegx\PhpUnit\DataProviders\DataProvider;

trait TestEndpointInvalidPaginationTrait
{
    #[PhpUnitDataProvider('provideCrossEndpointInvalidPaginationData')]
    public function testEndpointWithInvalidPagination(
        string $endpointName,
        string $methodName,
        array $methodParams,
        int $page,
        int $perPage,
        string $order
    ): void
    {
        $methodParams = \array_merge($methodParams, [$page, $perPage, $order]);

        $this->expectException(ValidationException::class);
        $this->givenApi()->$endpointName()->$methodName(...$methodParams);
    }

    public static function provideCrossEndpointInvalidPaginationData(): DataProvider
    {
        return DataProvider::cross(
            self::provideEndpointInvalidPaginationData(),
            self::provideInvalidPaginationData()
        );
    }

    public static function provideInvalidPaginationData(): \Generator
    {
        yield 'zero page' => [0, 25, 'asc'];
        yield 'zero per page' => [1, 0, 'desc'];
        yield 'invalid order' => [1, 25, 'invalid'];
    }

    public abstract static function provideEndpointInvalidPaginationData(): \Generator;
}