<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Coach;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class CoachTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Coach([
            'id' => 1,
            'player_id' => 1,
            'sport_id' => 1,
            'country_id' => 1,
            'nationality_id' => 1,
            'city_id' => 1,
            'common_name' => 'common name',
            'firstname' => 'first name',
            'lastname' => 'last name',
            'name' => 'name',
            'display_name' => 'display name',
            'image_path' => 'https://image.path',
            'height' => 180,
            'weight' => 80,
            'date_of_birth' => '1990-01-01',
            'gender' => 'male'
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getPlayerId());
        $this->assertSame(1, $entity->getSportId());
        $this->assertSame(1, $entity->getCountryId());
        $this->assertSame(1, $entity->getNationalityId());
        $this->assertSame(1, $entity->getCityId());
        $this->assertSame('common name', $entity->getCommonName());
        $this->assertSame('first name', $entity->getFirstName());
        $this->assertSame('last name', $entity->getLastName());
        $this->assertSame('name', $entity->getName());
        $this->assertSame('display name', $entity->getDisplayName());
        $this->assertSame('https://image.path', $entity->getImagePath());
        $this->assertSame(180, $entity->getHeight());
        $this->assertSame(80, $entity->getWeight());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getBirthdate());
        $this->assertSame('male', $entity->getGender());
    }
}