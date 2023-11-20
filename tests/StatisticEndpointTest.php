<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\CoachStatistic;
use ProgrammatorDev\SportMonksFootball\Entity\CoachStatisticDetail;
use ProgrammatorDev\SportMonksFootball\Entity\PlayerStatistic;
use ProgrammatorDev\SportMonksFootball\Entity\PlayerStatisticDetail;
use ProgrammatorDev\SportMonksFootball\Entity\RefereeStatistic;
use ProgrammatorDev\SportMonksFootball\Entity\RefereeStatisticDetail;
use ProgrammatorDev\SportMonksFootball\Entity\Statistic;
use ProgrammatorDev\SportMonksFootball\Entity\TeamStatistic;
use ProgrammatorDev\SportMonksFootball\Entity\TeamStatisticDetail;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointInvalidPaginationTrait;

class StatisticEndpointTest extends AbstractTest
{
    use TestEndpointCollectionResponseTrait;
    use TestEndpointInvalidPaginationTrait;

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all by player id' => [
            MockResponse::PLAYER_STATISTIC_COLLECTION_DATA,
            'statistics',
            'getAllByPlayerId',
            [1],
            'assertPlayerStatisticResponse'
        ];
        yield 'get all by team id' => [
            MockResponse::TEAM_STATISTIC_COLLECTION_DATA,
            'statistics',
            'getAllByTeamId',
            [1],
            'assertTeamStatisticResponse'
        ];
        yield 'get all by coach id' => [
            MockResponse::COACH_STATISTIC_COLLECTION_DATA,
            'statistics',
            'getAllByCoachId',
            [1],
            'assertCoachStatisticResponse'
        ];
        yield 'get all by referee id' => [
            MockResponse::REFEREE_STATISTIC_COLLECTION_DATA,
            'statistics',
            'getAllByRefereeId',
            [1],
            'assertRefereeStatisticResponse'
        ];
        yield 'get all by stage id' => [
            MockResponse::STATISTIC_COLLECTION_DATA,
            'statistics',
            'getAllByStageId',
            [1],
            'assertStatisticResponse'
        ];
        yield 'get all by round id' => [
            MockResponse::STATISTIC_COLLECTION_DATA,
            'statistics',
            'getAllByRoundId',
            [1],
            'assertStatisticResponse'
        ];
    }

    public static function provideEndpointInvalidPaginationData(): \Generator
    {
        yield 'get all by player id' => ['statistics', 'getAllByPlayerId', [1]];
        yield 'get all by team id' => ['statistics', 'getAllByTeamId', [1]];
        yield 'get all by coach id' => ['statistics', 'getAllByCoachId', [1]];
        yield 'get all by referee id' => ['statistics', 'getAllByRefereeId', [1]];
        yield 'get all by stage id' => ['statistics', 'getAllByStageId', [1]];
        yield 'get all by round id' => ['statistics', 'getAllByRoundId', [1]];
    }

    private function assertPlayerStatisticResponse(PlayerStatistic $playerStatistic): void
    {
        $this->assertSame(27356197, $playerStatistic->getId());
        $this->assertSame(14, $playerStatistic->getPlayerId());
        $this->assertSame(293, $playerStatistic->getTeamId());
        $this->assertSame(1282, $playerStatistic->getSeasonId());
        $this->assertSame(true, $playerStatistic->hasValues());
        $this->assertSame(25, $playerStatistic->getPositionId());
        $this->assertSame(22, $playerStatistic->getJerseyNumber());

        $details = $playerStatistic->getDetails();
        $this->assertContainsOnlyInstancesOf(PlayerStatisticDetail::class, $details);
        $this->assertSame(26922109, $details[0]->getId());
        $this->assertSame(27356197, $details[0]->getPlayerStatisticId());
        $this->assertSame(52, $details[0]->getTypeId());
        $this->assertSame(['total' => 1, 'goals' => 1, 'penalties' => 0], $details[0]->getValue());
    }

    private function assertTeamStatisticResponse(TeamStatistic $teamStatistic): void
    {
        $this->assertSame(38080, $teamStatistic->getId());
        $this->assertSame(53, $teamStatistic->getTeamId());
        $this->assertSame(718, $teamStatistic->getSeasonId());
        $this->assertSame(true, $teamStatistic->hasValues());

        $details = $teamStatistic->getDetails();
        $this->assertContainsOnlyInstancesOf(TeamStatisticDetail::class, $details);
        $this->assertSame(345190, $details[0]->getId());
        $this->assertSame(38080, $details[0]->getTeamStatisticId());
        $this->assertSame(194, $details[0]->getTypeId());
        $this->assertSame([
            'all' => ['count' => 1, 'percentage' => 8.33],
            'home' => ['count' => 1, 'percentage' => 100],
            'away' => ['count' => 0, 'percentage' => 0]
        ], $details[0]->getValue());
    }

    private function assertCoachStatisticResponse(CoachStatistic $coachStatistic): void
    {
        $this->assertSame(29782, $coachStatistic->getId());
        $this->assertSame(50, $coachStatistic->getCoachId());
        $this->assertSame(62, $coachStatistic->getTeamId());
        $this->assertSame(12963, $coachStatistic->getSeasonId());

        $details = $coachStatistic->getDetails();
        $this->assertContainsOnlyInstancesOf(CoachStatisticDetail::class, $details);
        $this->assertSame(237659, $details[0]->getId());
        $this->assertSame(29782, $details[0]->getCoachStatisticId());
        $this->assertSame(215, $details[0]->getTypeId());
        $this->assertSame(['count' => 9], $details[0]->getValue());
    }

    private function assertRefereeStatisticResponse(RefereeStatistic $refereeStatistic): void
    {
        $this->assertSame(52911, $refereeStatistic->getId());
        $this->assertSame(37, $refereeStatistic->getRefereeId());
        $this->assertSame(6018, $refereeStatistic->getSeasonId());

        $details = $refereeStatistic->getDetails();
        $this->assertContainsOnlyInstancesOf(RefereeStatisticDetail::class, $details);
        $this->assertSame(370211, $details[0]->getId());
        $this->assertSame(52911, $details[0]->getRefereeStatisticId());
        $this->assertSame(188, $details[0]->getTypeId());
        $this->assertSame(['count' => 1], $details[0]->getValue());
    }

    private function assertStatisticResponse(Statistic $statistic): void
    {
        $this->assertSame(647677, $statistic->getId());
        $this->assertSame(77463996, $statistic->getModelId());
        $this->assertSame(209, $statistic->getTypeId());
        $this->assertSame(21413511, $statistic->getRelationId());
        $this->assertSame(['count' => 5, 'player_id' => 21413511, 'player_name' => 'Elias Achouri'], $statistic->getValue());
    }
}