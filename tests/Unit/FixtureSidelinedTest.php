<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\FixtureSidelined;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class FixtureSidelinedTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new FixtureSidelined([
            'id' => 1,
            'fixture_id' => 1,
            'sideline_id' => 1,
            'participant_id' => 1,
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getFixtureId());
        $this->assertSame(1, $entity->getSidelinedId());
        $this->assertSame(1, $entity->getParticipantId());
    }
}