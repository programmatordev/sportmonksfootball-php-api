<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\TeamStatistic;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class TeamStatisticTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new TeamStatistic([
            'id' => 1,
            'season_id' => 1,
            'team_id' => 1,
            'has_values' => true
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSeasonId());
        $this->assertSame(1, $entity->getTeamId());
        $this->assertSame(true, $entity->hasValues());
    }
}