<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\TeamStatisticDetail;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class TeamStatisticDetailTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new TeamStatisticDetail([
            'id' => 1,
            'team_statistic_id' => 1,
            'type_id' => 1,
            'value' => ['data' => 'test']
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getTeamStatisticId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(['data' => 'test'], $entity->getValue());
    }
}