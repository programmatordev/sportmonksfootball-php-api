<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\BookmakerCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\BookmakerItem;
use ProgrammatorDev\SportMonksFootball\Entity\Response\PlayerCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\PlayerItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestValidationExceptionTrait;

class PlayerResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            PlayerItem::class,
            MockResponse::PLAYER_ITEM_DATA,
            'players',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            PlayerCollection::class,
            MockResponse::PLAYER_COLLECTION_DATA,
            'players',
            'getAll'
        ];
        yield 'get all by country id' => [
            PlayerCollection::class,
            MockResponse::PLAYER_COLLECTION_DATA,
            'players',
            'getAllByCountryId',
            [1]
        ];
        yield 'get all by search query' => [
            PlayerCollection::class,
            MockResponse::PLAYER_COLLECTION_DATA,
            'players',
            'getAllBySearchQuery',
            ['test']
        ];
        yield 'get all last updated' => [
            PlayerCollection::class,
            MockResponse::PLAYER_COLLECTION_DATA,
            'players',
            'getAllLastUpdated'
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get all by search query, blank query' => [
            'players',
            'getAllBySearchQuery',
            ['']
        ];
    }
}