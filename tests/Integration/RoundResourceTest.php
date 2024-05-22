<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\RoundCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\RoundItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestValidationExceptionTrait;

class RoundResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;
    use TestValidationExceptionTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            RoundItem::class,
            MockResponse::ROUND_ITEM_DATA,
            'rounds',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            RoundCollection::class,
            MockResponse::ROUND_COLLECTION_DATA,
            'rounds',
            'getAll'
        ];
        yield 'get all by season id' => [
            RoundCollection::class,
            MockResponse::ROUND_COLLECTION_DATA,
            'rounds',
            'getAllBySeasonId',
            [1]
        ];
        yield 'get all by search query' => [
            RoundCollection::class,
            MockResponse::ROUND_COLLECTION_DATA,
            'rounds',
            'getAllBySearchQuery',
            ['test']
        ];
    }

    public static function provideValidationExceptionData(): \Generator
    {
        yield 'get all by search query, blank query' => [
            'rounds',
            'getAllBySearchQuery',
            ['']
        ];
    }
}