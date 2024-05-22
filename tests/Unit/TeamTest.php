<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Team;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class TeamTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Team([
            'id' => 1,
            'sport_id' => 1,
            'country_id' => 1,
            'venue_id' => 1,
            'name' => 'name',
            'short_code' => 'SCP',
            'image_path' => 'https://image.path',
            'founded' => 1906,
            'type' => 'domestic',
            'placeholder' => false,
            'last_played_at' => '2024-01-01 16:00:00'
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSportId());
        $this->assertSame(1, $entity->getCountryId());
        $this->assertSame(1, $entity->getVenueId());
        $this->assertSame('name', $entity->getName());
        $this->assertSame('SCP', $entity->getShortCode());
        $this->assertSame('https://image.path', $entity->getImagePath());
        $this->assertSame(1906, $entity->getFoundedIn());
        $this->assertSame('domestic', $entity->getType());
        $this->assertSame(false, $entity->isPlaceholder());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getLastPlayedAt());
    }
}