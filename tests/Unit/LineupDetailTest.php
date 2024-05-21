<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\LineupDetail;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class LineupDetailTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new LineupDetail([
            'id' => 1,
            'fixture_id' => 1,
            'player_id' => 1,
            'team_id' => 1,
            'lineup_id' => 1,
            'type_id' => 1,
            'data' => ['data' => 'test']
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getFixtureId());
        $this->assertSame(1, $entity->getPlayerId());
        $this->assertSame(1, $entity->getTeamId());
        $this->assertSame(1, $entity->getLineupId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(['data' => 'test'], $entity->getData());
    }
}