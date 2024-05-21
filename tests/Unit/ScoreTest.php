<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Score;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class ScoreTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Score([
            'id' => 1,
            'fixture_id' => 1,
            'type_id' => 1,
            'participant_id' => 1,
            'score' => [
                'goals' => 0,
                'participant' => 'home'
            ],
            'description' => 'CURRENT'
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getFixtureId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(1, $entity->getParticipantId());
        $this->assertSame(0, $entity->getGoals());
        $this->assertSame('home', $entity->getLocation());
        $this->assertSame('CURRENT', $entity->getDescription());
    }
}