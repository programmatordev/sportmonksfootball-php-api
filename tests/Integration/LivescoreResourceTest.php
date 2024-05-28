<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\BookmakerCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\BookmakerItem;
use ProgrammatorDev\SportMonksFootball\Entity\Response\FixtureCollection;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;

class LivescoreResourceTest extends AbstractTest
{
    use TestCollectionResponseTrait;

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            FixtureCollection::class,
            MockResponse::FIXTURE_COLLECTION_DATA,
            'livescores',
            'getAll'
        ];
        yield 'get all inplay' => [
            FixtureCollection::class,
            MockResponse::FIXTURE_COLLECTION_DATA,
            'livescores',
            'getAllInplay'
        ];
        yield 'get all last updated' => [
            FixtureCollection::class,
            MockResponse::FIXTURE_COLLECTION_DATA,
            'livescores',
            'getAllLastUpdated'
        ];
    }
}