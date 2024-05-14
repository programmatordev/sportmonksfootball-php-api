<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\TvStation;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointItemResponseTrait;

class TvStationEndpointTest extends AbstractTest
{
    use TestEndpointItemResponseTrait;
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;

    public static function provideEndpointItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MockResponse::TV_STATION_ITEM_DATA,
            'tvStations',
            'getById',
            [1]
        ];
    }

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MockResponse::TV_STATION_COLLECTION_DATA,
            'tvStations',
            'getAll',
            []
        ];
        yield 'get all by fixture id' => [
            MockResponse::TV_STATION_COLLECTION_DATA,
            'tvStations',
            'getAllByFixtureId',
            [1]
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all' => ['tvStations', 'getAll', []];
    }

    private function assertResponse(TvStation $tvStation): void
    {
        $this->assertSame(33, $tvStation->getId());
        $this->assertSame('Star+', $tvStation->getName());
        $this->assertSame('https://www.starplus.com/', $tvStation->getUrl());
        $this->assertSame('https://cdn.sportmonks.com/images/core/tvstations/1/33.png', $tvStation->getImagePath());
        $this->assertSame('tv', $tvStation->getType());
        $this->assertSame(null, $tvStation->getRelatedId());
    }
}