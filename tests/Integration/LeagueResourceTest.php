<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\BookmakerCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\BookmakerItem;
use ProgrammatorDev\SportMonksFootball\Entity\Response\LeagueCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\LeagueItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestValidationExceptionTrait;

class LeagueResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            LeagueItem::class,
            MockResponse::LEAGUE_ITEM_DATA,
            'leagues',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            LeagueCollection::class,
            MockResponse::LEAGUE_COLLECTION_DATA,
            'leagues',
            'getAll'
        ];
        yield 'get all live' => [
            LeagueCollection::class,
            MockResponse::LEAGUE_COLLECTION_DATA,
            'leagues',
            'getAllLive'
        ];
        yield 'get all by fixture date' => [
            LeagueCollection::class,
            MockResponse::LEAGUE_COLLECTION_DATA,
            'leagues',
            'getAllByFixtureDate',
            [new \DateTime('today')]
        ];
        yield 'get all by country id' => [
            LeagueCollection::class,
            MockResponse::LEAGUE_COLLECTION_DATA,
            'leagues',
            'getAllByCountryId',
            [1]
        ];
        yield 'get all by search query' => [
            LeagueCollection::class,
            MockResponse::LEAGUE_COLLECTION_DATA,
            'leagues',
            'getAllBySearchQuery',
            ['test']
        ];
        yield 'get all by team id' => [
            LeagueCollection::class,
            MockResponse::LEAGUE_COLLECTION_DATA,
            'leagues',
            'getAllByTeamId',
            [1]
        ];
        yield 'get all current by team id' => [
            LeagueCollection::class,
            MockResponse::LEAGUE_COLLECTION_DATA,
            'leagues',
            'getAllCurrentByTeamId',
            [1]
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get all by search query, blank query' => [
            'leagues',
            'getAllBySearchQuery',
            ['']
        ];
    }
}