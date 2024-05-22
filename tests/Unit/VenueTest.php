<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Venue;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class VenueTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Venue([
            'id' => 1,
            'country_id' => 1,
            'city_id' => 1,
            'name' => 'name',
            'address' => 'address',
            'zip_code' => '1000-100',
            'latitude' => 50,
            'longitude' => 50,
            'capacity' => 10000,
            'image_path' => 'https://image.path',
            'city_name' => 'city name',
            'surface' => 'grass',
            'national_team' => false
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getCountryId());
        $this->assertSame(1, $entity->getCityId());
        $this->assertSame('name', $entity->getName());
        $this->assertSame('address', $entity->getAddress());
        $this->assertSame('1000-100', $entity->getZipCode());
        $this->assertSame(50.0, $entity->getLatitude());
        $this->assertSame(50.0, $entity->getLongitude());
        $this->assertSame(10000, $entity->getCapacity());
        $this->assertSame('https://image.path', $entity->getImagePath());
        $this->assertSame('city name', $entity->getCityName());
        $this->assertSame('grass', $entity->getSurface());
        $this->assertSame(false, $entity->isNationalTeam());
    }
}
