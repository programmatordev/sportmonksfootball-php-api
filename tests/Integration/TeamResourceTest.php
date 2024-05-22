<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\TeamCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TeamItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestValidationExceptionTrait;

class TeamResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            TeamItem::class,
            MockResponse::TEAM_ITEM_DATA,
            'teams',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            TeamCollection::class,
            MockResponse::TEAM_COLLECTION_DATA,
            'teams',
            'getAll'
        ];
        yield 'get all by country id' => [
            TeamCollection::class,
            MockResponse::TEAM_COLLECTION_DATA,
            'teams',
            'getAllByCountryId',
            [1]
        ];
        yield 'get all by season id' => [
            TeamCollection::class,
            MockResponse::TEAM_COLLECTION_DATA,
            'teams',
            'getAllBySeasonId',
            [1]
        ];
        yield 'get all by search query' => [
            TeamCollection::class,
            MockResponse::TEAM_COLLECTION_DATA,
            'teams',
            'getAllBySearchQuery',
            ['test']
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get all by search query, blank query' => [
            'teams',
            'getAllBySearchQuery',
            ['']
        ];
    }
}