<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\FixtureCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\FixtureItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestValidationExceptionTrait;

class FixtureResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            FixtureItem::class,
            MockResponse::FIXTURE_ITEM_DATA,
            'fixtures',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            FixtureCollection::class,
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAll'
        ];
        yield 'get all by multiple ids' => [
            FixtureCollection::class,
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllByMultipleIds',
            [[1, 2]]
        ];
        yield 'get all by date' => [
            FixtureCollection::class,
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllByDate',
            [new \DateTime('today')]
        ];
        yield 'get all by date range' => [
            FixtureCollection::class,
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllByDateRange',
            [new \DateTime('today'), new \DateTime('tomorrow')]
        ];
        yield 'get all by team id and date range' => [
            FixtureCollection::class,
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllByTeamIdAndDateRange',
            [1, new \DateTime('today'), new \DateTime('tomorrow')]
        ];
        yield 'get all by head to head' => [
            FixtureCollection::class,
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllByHeadToHead',
            [1, 2]
        ];
        yield 'get all upcoming by market id' => [
            FixtureCollection::class,
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllUpcomingByMarketId',
            [1]
        ];
        yield 'get all upcoming by tv station id' => [
            FixtureCollection::class,
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllUpcomingByTvStationId',
            [1]
        ];
        yield 'get all past by tv station id' => [
            FixtureCollection::class,
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllPastByTvStationId',
            [1]
        ];
        yield 'get all last updated' => [
            FixtureCollection::class,
            MockResponse::FIXTURE_COLLECTION_DATA,
            'fixtures',
            'getAllLastUpdated'
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get all by multiple ids, invalid integer' => [
            'fixtures',
            'getAllByMultipleIds',
            [[1, 'a']]
        ];
        yield 'get all by date range, invalid date order' => [
            'fixtures',
            'getAllByDateRange',
            [new \DateTime('today'), new \DateTime('yesterday')]
        ];
        yield 'get all by team id and date range, invalid date order' => [
            'fixtures',
            'getAllByTeamIdAndDateRange',
            [1, new \DateTime('today'), new \DateTime('yesterday')]
        ];
        yield 'get all by search query, blank query' => [
            'fixtures',
            'getAllBySearchQuery',
            ['']
        ];
    }
}