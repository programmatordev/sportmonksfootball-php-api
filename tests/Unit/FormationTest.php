<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Formation;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class FormationTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Formation([
            'id' => 1,
            'fixture_id' => 1,
            'participant_id' => 1,
            'formation' => '3-4-3',
            'location' => 'home'
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getFixtureId());
        $this->assertSame(1, $entity->getParticipantId());
        $this->assertSame('3-4-3', $entity->getFormation());
        $this->assertSame('home', $entity->getLocation());
    }
}