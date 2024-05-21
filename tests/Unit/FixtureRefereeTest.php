<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\FixtureReferee;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class FixtureRefereeTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new FixtureReferee([
            'id' => 1,
            'fixture_id' => 1,
            'referee_id' => 1,
            'type_id' => 1,
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getFixtureId());
        $this->assertSame(1, $entity->getRefereeId());
        $this->assertSame(1, $entity->getTypeId());
    }
}