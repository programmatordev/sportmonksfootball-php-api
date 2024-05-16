<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Continent;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class ContinentTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Continent([
            'id' => 1,
            'name' => 'name',
            'code' => 'EU'
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame('name', $entity->getName());
        $this->assertSame('EU', $entity->getCode());
    }
}