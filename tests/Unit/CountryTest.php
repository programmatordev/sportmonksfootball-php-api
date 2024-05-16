<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Country;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class CountryTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Country([
            'id' => 1,
            'continent_id' => 1,
            'name' => 'name',
            'official_name' => 'official name',
            'fifa_name' => 'POR',
            'iso2' => 'PT',
            'iso3' => 'PRT',
            'latitude' => 50,
            'longitude' => 50,
            'borders' => ['PT'],
            'image_path' => 'https://cdn.sportmonks.com/images/countries/png/short/pt.png'
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getContinentId());
        $this->assertSame('name', $entity->getName());
        $this->assertSame('official name', $entity->getOfficialName());
        $this->assertSame('POR', $entity->getFifaName());
        $this->assertSame('PT', $entity->getIso2());
        $this->assertSame('PRT', $entity->getIso3());
        $this->assertSame(50.0, $entity->getLatitude());
        $this->assertSame(50.0, $entity->getLongitude());
        $this->assertSame(['PT'], $entity->getBorders());
        $this->assertSame('https://cdn.sportmonks.com/images/countries/png/short/pt.png', $entity->getImagePath());
    }
}