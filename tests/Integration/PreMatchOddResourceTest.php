<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\OddCollection;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;

class PreMatchOddResourceTest extends AbstractTest
{
    use TestCollectionResponseTrait;

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            OddCollection::class,
            MockResponse::ODD_COLLECTION_DATA,
            'preMatchOdds',
            'getAll'
        ];
        yield 'get all by fixture id' => [
            OddCollection::class,
            MockResponse::ODD_COLLECTION_DATA,
            'preMatchOdds',
            'getAllByFixtureId',
            [1]
        ];
        yield 'get all by fixture id and bookmaker id' => [
            OddCollection::class,
            MockResponse::ODD_COLLECTION_DATA,
            'preMatchOdds',
            'getAllByFixtureIdAndBookmakerId',
            [1, 1]
        ];
        yield 'get all by fixture id and market id' => [
            OddCollection::class,
            MockResponse::ODD_COLLECTION_DATA,
            'preMatchOdds',
            'getAllByFixtureIdAndMarketId',
            [1, 1]
        ];
        yield 'get all last updated' => [
            OddCollection::class,
            MockResponse::ODD_COLLECTION_DATA,
            'preMatchOdds',
            'getAllLastUpdated'
        ];
    }
}