<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\MarketCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\MarketItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestValidationExceptionTrait;

class MarketResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            MarketItem::class,
            MockResponse::MARKET_ITEM_DATA,
            'markets',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            MarketCollection::class,
            MockResponse::MARKET_COLLECTION_DATA,
            'markets',
            'getAll'
        ];
        yield 'get all by search query' => [
            MarketCollection::class,
            MockResponse::MARKET_COLLECTION_DATA,
            'markets',
            'getAllBySearchQuery',
            ['test']
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get all by search query, blank query' => [
            'markets',
            'getAllBySearchQuery',
            ['']
        ];
    }
}