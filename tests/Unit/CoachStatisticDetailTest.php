<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\CoachStatisticDetail;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class CoachStatisticDetailTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new CoachStatisticDetail([
            'id' => 1,
            'coach_statistic_id' => 1,
            'type_id' => 1,
            'value' => ['data' => 'test']
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getCoachStatisticId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(['data' => 'test'], $entity->getValue());
    }
}