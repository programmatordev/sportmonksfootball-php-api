<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\SeasonCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\SeasonItem;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestItemResponseTrait;

class SeasonResourceTest extends AbstractTest
{
    use TestItemResponseTrait;
    use TestCollectionResponseTrait;

    public static function provideItemResponseData(): \Generator
    {
        yield 'get by id' => [
            SeasonItem::class,
            MockResponse::SEASON_ITEM_DATA,
            'seasons',
            'getById',
            [1]
        ];
    }

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            SeasonCollection::class,
            MockResponse::SEASON_COLLECTION_DATA,
            'seasons',
            'getAll'
        ];
        yield 'get all by team id' => [
            SeasonCollection::class,
            MockResponse::SEASON_COLLECTION_DATA,
            'seasons',
            'getAllByTeamId',
            [1]
        ];
        yield 'get all by search query' => [
            SeasonCollection::class,
            MockResponse::SEASON_COLLECTION_DATA,
            'seasons',
            'getAllBySearchQuery',
            ['test']
        ];
    }
}