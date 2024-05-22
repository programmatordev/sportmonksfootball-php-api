<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\CoachStatistic;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class CoachStatisticTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new CoachStatistic([
            'id' => 1,
            'season_id' => 1,
            'coach_id' => 1,
            'team_id' => 1
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSeasonId());
        $this->assertSame(1, $entity->getCoachId());
        $this->assertSame(1, $entity->getTeamId());
    }
}