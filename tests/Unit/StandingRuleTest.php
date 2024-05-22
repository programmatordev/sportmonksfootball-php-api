<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\StandingRule;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class StandingRuleTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new StandingRule([
            'id' => 1,
            'type_id' => 1,
            'model_id' => 1,
            'model_type' => 'stage',
            'position' => 1
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(1, $entity->getModelId());
        $this->assertSame('stage', $entity->getModelType());
        $this->assertSame(1, $entity->getPosition());
    }
}