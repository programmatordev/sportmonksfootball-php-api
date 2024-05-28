<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\TvStationCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TvStationItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;

class TvStationResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            TvStationItem::class,
            MockResponse::TV_STATION_ITEM_DATA,
            'tvStations',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            TvStationCollection::class,
            MockResponse::TV_STATION_COLLECTION_DATA,
            'tvStations',
            'getAll'
        ];
        yield 'get all by fixture id' => [
            TvStationCollection::class,
            MockResponse::TV_STATION_COLLECTION_DATA,
            'tvStations',
            'getAllByFixtureId',
            [1]
        ];
    }
}