<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Topscorer;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class TopscorerTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Topscorer([
            'id' => 1,
            'season_id' => 1,
            'player_id' => 1,
            'type_id' => 1,
            'participant_id' => 1,
            'position' => 1,
            'total' => 10
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSeasonId());
        $this->assertSame(1, $entity->getPlayerId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(1, $entity->getParticipantId());
        $this->assertSame(1, $entity->getPosition());
        $this->assertSame(10, $entity->getTotal());
    }
}