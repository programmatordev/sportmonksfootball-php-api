<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\RefereeCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\RefereeItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestValidationExceptionTrait;

class RefereeResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            RefereeItem::class,
            MockResponse::REFEREE_ITEM_DATA,
            'referees',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            RefereeCollection::class,
            MockResponse::REFEREE_COLLECTION_DATA,
            'referees',
            'getAll'
        ];
        yield 'get all by country id' => [
            RefereeCollection::class,
            MockResponse::REFEREE_COLLECTION_DATA,
            'referees',
            'getAllByCountryId',
            [1]
        ];
        yield 'get all by season id' => [
            RefereeCollection::class,
            MockResponse::REFEREE_COLLECTION_DATA,
            'referees',
            'getAllBySeasonId',
            [1]
        ];
        yield 'get all by search query' => [
            RefereeCollection::class,
            MockResponse::REFEREE_COLLECTION_DATA,
            'referees',
            'getAllBySearchQuery',
            ['test']
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get all by search query, blank query' => [
            'referees',
            'getAllBySearchQuery',
            ['']
        ];
    }
}