<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\RefereeStatistic;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class RefereeStatisticTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new RefereeStatistic([
            'id' => 1,
            'season_id' => 1,
            'referee_id' => 1
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSeasonId());
        $this->assertSame(1, $entity->getRefereeId());
    }
}