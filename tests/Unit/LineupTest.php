<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Lineup;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class LineupTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Lineup([
            'id' => 1,
            'fixture_id' => 1,
            'player_id' => 1,
            'type_id' => 1,
            'position_id' => 1,
            'team_id' => 1,
            'sport_id' => 1,
            'formation_field' => '1:1',
            'formation_position' => 1,
            'player_name' => 'player name',
            'jersey_number' => 1
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getFixtureId());
        $this->assertSame(1, $entity->getPlayerId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(1, $entity->getPositionId());
        $this->assertSame(1, $entity->getTeamId());
        $this->assertSame(1, $entity->getSportId());
        $this->assertSame('1:1', $entity->getFormationField());
        $this->assertSame(1, $entity->getFormationPosition());
        $this->assertSame('player name', $entity->getPlayerName());
        $this->assertSame(1, $entity->getJerseyNumber());
    }
}