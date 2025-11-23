<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\CountryCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\CountryItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;

class CountryResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            CountryItem::class,
            MockResponse::COUNTRY_ITEM_DATA,
            'countries',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            CountryCollection::class,
            MockResponse::COUNTRY_COLLECTION_DATA,
            'countries',
            'getAll'
        ];
        yield 'get all by search query' => [
            CountryCollection::class,
            MockResponse::COUNTRY_COLLECTION_DATA,
            'countries',
            'getAllBySearchQuery',
            ['test']
        ];
    }
}