<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Market;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class MarketTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Market([
            'id' => 1,
            'legacy_id' => 1,
            'name' => 'name',
            'developer_name' => 'DEVELOPER_NAME',
            'has_winning_calculations' => true
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getLegacyId());
        $this->assertSame('name', $entity->getName());
        $this->assertSame('DEVELOPER_NAME', $entity->getDeveloperName());
        $this->assertSame(true, $entity->hasWinningCalculations());
    }
}