<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Integration;

use ProgrammatorDev\SportMonksFootball\Entity\Response\CoachStatisticCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\PlayerStatisticCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\RefereeStatisticCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\StatisticCollection;
use ProgrammatorDev\SportMonksFootball\Entity\Response\TeamStatisticCollection;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;
use ProgrammatorDev\SportMonksFootball\Test\MockResponse;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestCollectionResponseTrait;

class StatisticResourceTest extends AbstractTest
{
    use TestCollectionResponseTrait;

    public static function provideCollectionResponseData(): \Generator
    {
        yield 'get all by player id' => [
            PlayerStatisticCollection::class,
            MockResponse::PLAYER_STATISTIC_COLLECTION_DATA,
            'statistics',
            'getAllByPlayerId',
            [1]
        ];
        yield 'get all by team id' => [
            TeamStatisticCollection::class,
            MockResponse::TEAM_STATISTIC_COLLECTION_DATA,
            'statistics',
            'getAllByTeamId',
            [1]
        ];
        yield 'get all by coach id' => [
            CoachStatisticCollection::class,
            MockResponse::COACH_STATISTIC_COLLECTION_DATA,
            'statistics',
            'getAllByCoachId',
            [1]
        ];
        yield 'get all by referee id' => [
            RefereeStatisticCollection::class,
            MockResponse::REFEREE_STATISTIC_COLLECTION_DATA,
            'statistics',
            'getAllByRefereeId',
            [1]
        ];
        yield 'get all by stage id' => [
            StatisticCollection::class,
            MockResponse::STATISTIC_COLLECTION_DATA,
            'statistics',
            'getAllByStageId',
            [1]
        ];
        yield 'get all by round id' => [
            StatisticCollection::class,
            MockResponse::STATISTIC_COLLECTION_DATA,
            'statistics',
            'getAllByRoundId',
            [1]
        ];
    }
}