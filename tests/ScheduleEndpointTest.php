<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Stage;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;

class ScheduleEndpointTest extends AbstractTest
{
    use TestEndpointCollectionResponseTrait;

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all by season id' => [
            MockResponse::STAGE_COLLECTION_DATA,
            'schedules',
            'getAllBySeasonId',
            [1],
            Stage::class,
            'assertResponse'
        ];
        yield 'get all by team id' => [
            MockResponse::STAGE_COLLECTION_DATA,
            'schedules',
            'getAllByTeamId',
            [1],
            Stage::class,
            'assertResponse'
        ];
        yield 'get all by season id and team id' => [
            MockResponse::STAGE_COLLECTION_DATA,
            'schedules',
            'getAllBySeasonIdAndTeamId',
            [1, 1],
            Stage::class,
            'assertResponse'
        ];
    }

    private function assertResponse(Stage $stage): void
    {
        $this->assertSame(1086, $stage->getId());
        $this->assertSame(1, $stage->getSportId());
        $this->assertSame(271, $stage->getLeagueId());
        $this->assertSame(1273, $stage->getSeasonId());
        $this->assertSame(223, $stage->getTypeId());
        $this->assertSame('Regular Season', $stage->getName());
        $this->assertSame(1, $stage->getSortOrder());
        $this->assertSame(true, $stage->hasFinished());
        $this->assertSame(false, $stage->isCurrent());
        $this->assertSame('2005-07-19 00:00:00', $stage->getStartingAt()->format('Y-m-d H:i:s'));
        $this->assertSame('2006-05-14 00:00:00', $stage->getEndingAt()->format('Y-m-d H:i:s'));
        $this->assertSame(false, $stage->hasGamesInCurrentWeek());
        $this->assertSame(null, $stage->getTieBreakerRuleId());
    }
}