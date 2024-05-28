<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Plan;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class PlanTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Plan([
            'plan' => 'name',
            'sport' => 'sport',
            'category' => 'category'
        ]);

        $this->assertSame('name', $entity->getName());
        $this->assertSame('sport', $entity->getSport());
        $this->assertSame('category', $entity->getCategory());
    }
}