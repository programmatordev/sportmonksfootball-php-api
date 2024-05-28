<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\League;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class LeagueTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new League([
            'id' => 1,
            'sport_id' => 1,
            'country_id' => 1,
            'name' => 'name',
            'active' => true,
            'short_code' => 'short code',
            'image_path' => 'https://image.path',
            'type' => 'league',
            'sub_type' => 'domestic',
            'last_played_at' => '2024-01-01 16:00:00',
            'category' => 1,
            'has_jerseys' => false
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSportId());
        $this->assertSame(1, $entity->getCountryId());
        $this->assertSame('name', $entity->getName());
        $this->assertSame(true, $entity->isActive());
        $this->assertSame('short code', $entity->getShortCode());
        $this->assertSame('https://image.path', $entity->getImagePath());
        $this->assertSame('league', $entity->getType());
        $this->assertSame('domestic', $entity->getSubType());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getLastPlayedAt());
        $this->assertSame(1, $entity->getCategory());
        $this->assertSame(false, $entity->hasJerseys());
    }
}