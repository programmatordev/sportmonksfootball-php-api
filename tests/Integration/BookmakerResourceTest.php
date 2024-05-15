<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\BookmakerCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\BookmakerItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestValidationExceptionTrait;

class BookmakerResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            BookmakerItem::class,
            MockResponse::BOOKMAKER_ITEM_DATA,
            'bookmakers',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            BookmakerCollection::class,
            MockResponse::BOOKMAKER_COLLECTION_DATA,
            'bookmakers',
            'getAll'
        ];
        yield 'get all by fixture id' => [
            BookmakerCollection::class,
            MockResponse::BOOKMAKER_COLLECTION_DATA,
            'bookmakers',
            'getAllByFixtureId',
            [1]
        ];
        yield 'get all by search query' => [
            BookmakerCollection::class,
            MockResponse::BOOKMAKER_COLLECTION_DATA,
            'bookmakers',
            'getAllBySearchQuery',
            ['test']
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get all by search query, blank query' => ['bookmakers', 'getAllBySearchQuery', ['']];
    }
}