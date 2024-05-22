<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\BookmakerCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\BookmakerItem;
use ProgrammatorDev\SportMonksFootball\Entity\Response\StandingCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\StandingCorrectionCollection;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;

class StandingResourceTest extends AbstractTest
{
    use TestCollectionResponseTrait;

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all' => [
            StandingCollection::class,
            MockResponse::STANDING_COLLECTION_DATA,
            'standings',
            'getAll'
        ];
        yield 'get all by season id' => [
            StandingCollection::class,
            MockResponse::STANDING_COLLECTION_DATA,
            'standings',
            'getAllBySeasonId',
            [1]
        ];
        yield 'get all corrections by season id' => [
            StandingCorrectionCollection::class,
            MockResponse::STANDING_CORRECTION_COLLECTION_DATA,
            'standings',
            'getAllCorrectionsBySeasonId',
            [1]
        ];
        yield 'get all by round id' => [
            StandingCollection::class,
            MockResponse::STANDING_COLLECTION_DATA,
            'standings',
            'getAllByRoundId',
            [1]
        ];
        yield 'get all live by league id' => [
            StandingCollection::class,
            MockResponse::STANDING_COLLECTION_DATA,
            'standings',
            'getAllLiveByLeagueId',
            [1]
        ];
    }
}