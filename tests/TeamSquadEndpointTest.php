<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use ProgrammatorDev\SportMonksFootball\Entity\Player;
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
            'assertTeamSquadResponse'
        ];
        yield 'get all extended by team id' => [
            MockResponse::PLAYER_COLLECTION_DATA,
            'teamSquads',
            'getAllExtendedByTeamId',
            [1],
            'assertPlayerResponse'
        ];
        yield 'get all by season id and team id' => [
            MockResponse::TEAM_SQUAD_COLLECTION_DATA,
            'teamSquads',
            'getAllBySeasonIdAndTeamId',
            [1, 1],
            'assertTeamSquadResponse'
        ];
    }

    private function assertTeamSquadResponse(TeamSquad $teamSquad): void
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

    private function assertPlayerResponse(Player $player): void
    {
        $this->assertSame(14, $player->getId());
        $this->assertSame(1, $player->getSportId());
        $this->assertSame(320, $player->getCountryId());
        $this->assertSame(320, $player->getNationalityId());
        $this->assertSame(null, $player->getCityId());
        $this->assertSame(25, $player->getPositionId());
        $this->assertSame(null, $player->getDetailedPositionId());
        $this->assertSame(25, $player->getTypeId());
        $this->assertSame('D. Agger', $player->getCommonName());
        $this->assertSame('Daniel Munthe', $player->getFirstName());
        $this->assertSame('Agger', $player->getLastName());
        $this->assertSame('Daniel Munthe Agger', $player->getName());
        $this->assertSame('Daniel Agger', $player->getDisplayName());
        $this->assertSame('https://cdn.sportmonks.com/images/soccer/players/14/14.png', $player->getImagePath());
        $this->assertSame(191, $player->getHeight());
        $this->assertSame(84, $player->getWeight());
        $this->assertSame('1984-12-12 00:00:00', $player->getDateOfBirth()->format('Y-m-d H:i:s'));
        $this->assertSame('male', $player->getGender());
        $this->assertSame(true, $player->inSquad());
    }
}