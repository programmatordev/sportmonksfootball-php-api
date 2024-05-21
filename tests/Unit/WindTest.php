<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Wind;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class WindTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Wind([
            'speed' => 10,
            'direction' => 10
        ]);

        $this->assertSame(10.0, $entity->getSpeed());
        $this->assertSame(10, $entity->getDirection());
    }
}