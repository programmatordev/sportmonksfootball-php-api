<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\TeamSquad;
use ProgrammatorDev\SportMonksFootball\Test\Util\TestEndpointCollectionResponseTrait;

class TeamSquadEndpointTest extends AbstractTest
{
    use TestEndpointCollectionResponseTrait;

    public static function provideEndpointCollectionResponseData(): \Generator
    {
        yield 'get all by team id' => [
            MockResponse::TEAM_SQUAD_COLLECTION_DATA,
            'teamSquads',
            'getAllByTeamId',
            [1],
            TeamSquad::class,
            'assertResponse'
        ];
        yield 'get all by season id and team id' => [
            MockResponse::TEAM_SQUAD_COLLECTION_DATA,
            'teamSquads',
            'getAllBySeasonIdAndTeamId',
            [1, 1],
            TeamSquad::class,
            'assertResponse'
        ];
    }

    private function assertResponse(TeamSquad $teamSquad): void
    {
        $this->assertSame(741301, $teamSquad->getId());
        $this->assertSame(233006, $teamSquad->getTransferId());
        $this->assertSame(8056287, $teamSquad->getPlayerId());
        $this->assertSame(53, $teamSquad->getTeamId());
        $this->assertSame(25, $teamSquad->getPositionId());
        $this->assertSame(148, $teamSquad->getDetailedPositionId());
        $this->assertSame('2023-07-26 00:00:00', $teamSquad->getStartingAt()->format('Y-m-d H:i:s'));
        $this->assertSame('2028-05-31 00:00:00', $teamSquad->getEndingAt()->format('Y-m-d H:i:s'));
        $this->assertSame(false, $teamSquad->isCaptain());
        $this->assertSame(17, $teamSquad->getJerseyNumber());
    }
}