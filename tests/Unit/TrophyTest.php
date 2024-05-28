<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Trophy;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class TrophyTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Trophy([
            'id' => 1,
            'sport_id' => 1,
            'position' => 1,
            'name' => 'name'
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSportId());
        $this->assertSame(1, $entity->getPosition());
        $this->assertSame('name', $entity->getName());
    }
}