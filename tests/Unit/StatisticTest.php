<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Statistic;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class StatisticTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Statistic([
            'id' => 1,
            'model_id' => 1,
            'type_id' => 1,
            'relation_id' => 1,
            'value' => ['data' => 'test']
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getModelId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(1, $entity->getRelationId());
        $this->assertSame(['data' => 'test'], $entity->getValue());
    }
}