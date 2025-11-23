<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\StageCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\StageItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;

class StageResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            StageItem::class,
            MockResponse::STAGE_ITEM_DATA,
            'stages',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            StageCollection::class,
            MockResponse::STAGE_COLLECTION_DATA,
            'stages',
            'getAll'
        ];
        yield 'get all by season id' => [
            StageCollection::class,
            MockResponse::STAGE_COLLECTION_DATA,
            'stages',
            'getAllBySeasonId',
            [1]
        ];
        yield 'get all by search query' => [
            StageCollection::class,
            MockResponse::STAGE_COLLECTION_DATA,
            'stages',
            'getAllBySearchQuery',
            ['test']
        ];
    }
}