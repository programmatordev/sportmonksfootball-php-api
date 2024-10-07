<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Ranking;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class RankingTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Ranking([
            'id' => 1,
            'participant_id' => 1,
            'sport_id' => 1,
            'position' => 1,
            'points' => 1,
            'type' => 'type'
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getParticipantId());
        $this->assertSame(1, $entity->getSportId());
        $this->assertSame(1, $entity->getPosition());
        $this->assertSame(1, $entity->getPoints());
        $this->assertSame('type', $entity->getType());
    }
}