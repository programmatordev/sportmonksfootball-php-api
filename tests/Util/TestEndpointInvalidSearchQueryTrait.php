<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Util;

use PHPUnit\Framework\Attributes\DataProvider as PhpUnitDataProvider;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use TRegx\PhpUnit\DataProviders\DataProvider;

trait TestEndpointInvalidSearchQueryTrait
{
    #[PhpUnitDataProvider('provideCrossEndpointInvalidSearchQueryData')]
    public function testEndpointWithInvalidSearchQuery(
        string $endpointName,
        string $methodName,
        string $query,
    ): void
    {
        $this->expectException(ValidationException::class);
        $this->givenApi()->$endpointName()->$methodName($query);
    }

    public static function provideCrossEndpointInvalidSearchQueryData(): DataProvider
    {
        return DataProvider::cross(
            self::provideEndpointInvalidSearchQueryData(),
            self::provideInvalidSearchQueryData()
        );
    }

    public static function provideInvalidSearchQueryData(): \Generator
    {
        yield 'empty query' => [''];
    }

    public abstract static function provideEndpointInvalidSearchQueryData(): \Generator;
}