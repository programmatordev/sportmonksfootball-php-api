<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\City;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class CityTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new City([
            'id' => 1,
            'region_id' => 1,
            'country_id' => 1,
            'name' => 'name',
            'latitude' => 50,
            'longitude' => 50
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getRegionId());
        $this->assertSame(1, $entity->getCountryId());
        $this->assertSame('name', $entity->getName());
        $this->assertSame(50.0, $entity->getLatitude());
        $this->assertSame(50.0, $entity->getLongitude());
    }
}