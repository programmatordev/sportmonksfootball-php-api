<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\TeamSquad;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class TeamSquadTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new TeamSquad([
            'id' => 1,
            'transfer_id' => 1,
            'player_id' => 1,
            'team_id' => 1,
            'position_id' => 1,
            'detailed_position_id' => 1,
            'start' => '2024-01-01',
            'end' => '2024-01-07',
            'captain' => false,
            'jersey_number' => 1
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getTransferId());
        $this->assertSame(1, $entity->getPlayerId());
        $this->assertSame(1, $entity->getTeamId());
        $this->assertSame(1, $entity->getPositionId());
        $this->assertSame(1, $entity->getDetailedPositionId());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getStartAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getEndAt());
        $this->assertSame(false, $entity->isCaptain());
        $this->assertSame(1, $entity->getJerseyNumber());
    }
}