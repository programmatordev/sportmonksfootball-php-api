<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Rival;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class RivalTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Rival([
            'id' => 1,
            'sport_id' => 1,
            'team_id' => 1,
            'rival_id' => 1
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSportId());
        $this->assertSame(1, $entity->getTeamId());
        $this->assertSame(1, $entity->getRivalId());
    }
}