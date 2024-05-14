<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;

class TimezoneEndpointTest extends AbstractTest
{
    use TestEndpointCollectionResponseTrait;

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::TIMEZONE_COLLECTION_DATA,
            'timezones',
            'getAll',
            []
        ];
    }

    private function assertResponse(string $timezone): void
    {
        $this->assertSame('Africa/Abidjan', $timezone);
    }
}