<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\StageCollection;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;

class ScheduleResourceTest extends AbstractTest
{
    use TestCollectionResponseTrait;

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all by season id' => [
            StageCollection::class,
            MockResponse::STAGE_COLLECTION_DATA,
            'schedules',
            'getAllBySeasonId',
            [1]
        ];
        yield 'get all by team id' => [
            StageCollection::class,
            MockResponse::STAGE_COLLECTION_DATA,
            'schedules',
            'getAllByTeamId',
            [1]
        ];
        yield 'get all by season id and team id' => [
            StageCollection::class,
            MockResponse::STAGE_COLLECTION_DATA,
            'schedules',
            'getAllBySeasonIdAndTeamId',
            [1, 1]
        ];
    }
}