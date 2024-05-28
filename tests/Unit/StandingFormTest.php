<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\StandingForm;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class StandingFormTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new StandingForm([
            'id' => 1,
            'fixture_id' => 1,
            'standing_id' => 1,
            'standing_type' => 'standing',
            'form' => 'W',
            'sort_order' => 1
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getFixtureId());
        $this->assertSame(1, $entity->getStandingId());
        $this->assertSame('standing', $entity->getStandingType());
        $this->assertSame('W', $entity->getForm());
        $this->assertSame(1, $entity->getSortOrder());
    }
}