<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Region;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class RegionTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Region([
            'id' => 1,
            'country_id' => 1,
            'name' => 'name'
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getCountryId());
        $this->assertSame('name', $entity->getName());
    }
}