<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Util;

use PHPUnit\Framework\Attributes\DataProvider;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;

trait TestEndpointInvalidDateRangeTrait
{
    #[DataProvider('provideEndpointInvalidDateRangeData')]
    public function testEndpointWithInvalidDateRange(
        string $endpointName,
        string $methodName,
        array $methodParams
    ): void
    {
        $this->expectException(ValidationException::class);
        $this->givenApi()->$endpointName()->$methodName(...$methodParams);
    }

    public abstract static function provideEndpointInvalidDateRangeData(): \Generator;
}