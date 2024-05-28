<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\PlayerStatisticDetail;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class PlayerStatisticDetailTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new PlayerStatisticDetail([
            'id' => 1,
            'player_statistic_id' => 1,
            'type_id' => 1,
            'value' => ['data' => 'test']
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getPlayerStatisticId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(['data' => 'test'], $entity->getValue());
    }
}