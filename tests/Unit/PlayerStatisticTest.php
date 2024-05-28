<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\PlayerStatistic;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class PlayerStatisticTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new PlayerStatistic([
            'id' => 1,
            'season_id' => 1,
            'player_id' => 1,
            'team_id' => 1,
            'position_id' => 1,
            'has_values' => true,
            'jersey_number' => 1
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSeasonId());
        $this->assertSame(1, $entity->getPlayerId());
        $this->assertSame(1, $entity->getTeamId());
        $this->assertSame(1, $entity->getPositionId());
        $this->assertSame(true, $entity->hasValues());
        $this->assertSame(1, $entity->getJerseyNumber());
    }
}