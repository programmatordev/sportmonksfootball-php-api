<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\StandingDetail;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class StandingDetailTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new StandingDetail([
            'id' => 1,
            'type_id' => 1,
            'standing_id' => 1,
            'standing_type' => 'standing',
            'value' => 100
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(1, $entity->getStandingId());
        $this->assertSame('standing', $entity->getStandingType());
        $this->assertSame(100, $entity->getValue());
    }
}