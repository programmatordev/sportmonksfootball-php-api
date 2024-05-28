<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\FixtureTvStation;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class FixtureTvStationTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new FixtureTvStation([
            'id' => 1,
            'fixture_id' => 1,
            'tvstation_id' => 1,
            'country_id' => 1,
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getFixtureId());
        $this->assertSame(1, $entity->getTvStationId());
        $this->assertSame(1, $entity->getCountryId());
    }
}