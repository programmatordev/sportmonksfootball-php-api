<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Sport;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class SportTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Sport([
            'id' => 1,
            'name' => 'Football',
            'code' => 'football'
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame('Football', $entity->getName());
        $this->assertSame('football', $entity->getCode());
    }
}