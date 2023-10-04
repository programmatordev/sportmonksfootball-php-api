<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Util;

use PHPUnit\Framework\Attributes\DataProvider as PhpUnitDataProvider;
use ProgrammatorDev\YetAnotherPhpValidator\Exception\ValidationException;
use TRegx\PhpUnit\DataProviders\DataProvider;

trait TestEndpointInvalidDateRangeTrait
{
    #[PhpUnitDataProvider('provideCrossEndpointInvalidDateRangeData')]
    public function testEndpointWithInvalidDateRange(
        string $endpointName,
        string $methodName,
        \DateTimeInterface $startDate,
        \DateTimeInterface $endDate,
    ): void
    {
        $this->expectException(ValidationException::class);
        $this->givenApi()->$endpointName()->$methodName($startDate, $endDate);
    }

    public static function provideCrossEndpointInvalidDateRangeData(): DataProvider
    {
        return DataProvider::cross(
            self::provideEndpointInvalidDateRangeData(),
            self::provideInvalidDateRangeData()
        );
    }

    public static function provideInvalidDateRangeData(): \Generator
    {
        yield 'start date greater than end date' => [new \DateTime('-5 days'), new \DateTime('-10 days')];
        yield 'end date greater than today date' => [new \DateTime('yesterday'), new \DateTime('tomorrow')];
        yield 'date range greater than 31 days' => [new \DateTime('-32 days'), new \DateTime('today')];
    }

    public abstract static function provideEndpointInvalidDateRangeData(): \Generator;
}