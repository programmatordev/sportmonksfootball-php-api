<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Continent;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class ContinentEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::CONTINENT_ITEM_DATA,
            'continents',
            'getById',
            [1],
            Continent::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::CONTINENT_COLLECTION_DATA,
            'continents',
            'getAll',
            [],
            Continent::class,
            'assertResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['continents', 'getAll', []];
    }

    private function assertResponse(Continent $continent): void
    {
        $this->assertSame(1, $continent->getId());
        $this->assertSame('Europe', $continent->getName());
        $this->assertSame('EU', $continent->getCode());
    }
}