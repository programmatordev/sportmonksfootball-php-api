<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\CoachCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\CoachItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestValidationExceptionTrait;

class CoachResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            CoachItem::class,
            MockResponse::COACH_ITEM_DATA,
            'coaches',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            CoachCollection::class,
            MockResponse::COACH_COLLECTION_DATA,
            'coaches',
            'getAll'
        ];
        yield 'get all by country id' => [
            CoachCollection::class,
            MockResponse::COACH_COLLECTION_DATA,
            'coaches',
            'getAllByCountryId',
            [1]
        ];
        yield 'get all by search query' => [
            CoachCollection::class,
            MockResponse::COACH_COLLECTION_DATA,
            'coaches',
            'getAllBySearchQuery',
            ['test']
        ];
        yield 'get all last updated' => [
            CoachCollection::class,
            MockResponse::COACH_COLLECTION_DATA,
            'coaches',
            'getAllLastUpdated'
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get all by search query, blank query' => [
            'coaches',
            'getAllBySearchQuery',
            ['']
        ];
    }
}