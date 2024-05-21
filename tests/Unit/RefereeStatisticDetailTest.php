<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\RefereeStatisticDetail;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class RefereeStatisticDetailTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new RefereeStatisticDetail([
            'id' => 1,
            'referee_statistic_id' => 1,
            'type_id' => 1,
            'value' => ['data' => 'test']
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getRefereeStatisticId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(['data' => 'test'], $entity->getValue());
    }
}