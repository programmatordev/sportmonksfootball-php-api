<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\VenueCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\VenueItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;

class VenueResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            VenueItem::class,
            MockResponse::VENUE_ITEM_DATA,
            'venues',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            VenueCollection::class,
            MockResponse::VENUE_COLLECTION_DATA,
            'venues',
            'getAll'
        ];
        yield 'get all by season id' => [
            VenueCollection::class,
            MockResponse::VENUE_COLLECTION_DATA,
            'venues',
            'getAllBySeasonId',
            [1]
        ];
        yield 'get all by search query' => [
            VenueCollection::class,
            MockResponse::VENUE_COLLECTION_DATA,
            'venues',
            'getAllBySearchQuery',
            ['test']
        ];
    }
}