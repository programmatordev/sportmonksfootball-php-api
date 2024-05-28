<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\RegionCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\RegionItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestValidationExceptionTrait;

class RegionResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            RegionItem::class,
            MockResponse::REGION_ITEM_DATA,
            'regions',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            RegionCollection::class,
            MockResponse::REGION_COLLECTION_DATA,
            'regions',
            'getAll'
        ];
        yield 'get all by search query' => [
            RegionCollection::class,
            MockResponse::REGION_COLLECTION_DATA,
            'regions',
            'getAllBySearchQuery',
            ['test']
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get all by search query, blank query' => [
            'regions',
            'getAllBySearchQuery',
            ['']
        ];
    }
}