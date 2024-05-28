<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\State;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class StateTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new State([
            'id' => 1,
            'state' => 'NS',
            'name' => 'Not Started',
            'short_name' => 'NS',
            'developer_name' => 'NS'
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame('NS', $entity->getState());
        $this->assertSame('Not Started', $entity->getName());
        $this->assertSame('NS', $entity->getShortName());
        $this->assertSame('NS', $entity->getDeveloperName());
    }
}