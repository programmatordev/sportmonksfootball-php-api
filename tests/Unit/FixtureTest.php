<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Fixture;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class FixtureTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Fixture([
            'id' => 1,
            'sport_id' => 1,
            'league_id' => 1,
            'season_id' => 1,
            'stage_id' => 1,
            'group_id' => 1,
            'aggregate_id' => 1,
            'round_id' => 1,
            'state_id' => 1,
            'venue_id' => 1,
            'name' => 'name',
            'starting_at' => '2024-05-20 16:00:00',
            'result_info' => 'result info',
            'leg' => 'leg',
            'details' => 'details',
            'length' => 90,
            'placeholder' => false,
            'has_odds' => false,
            'has_premium_odds' => false
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSportId());
        $this->assertSame(1, $entity->getLeagueId());
        $this->assertSame(1, $entity->getSeasonId());
        $this->assertSame(1, $entity->getStageId());
        $this->assertSame(1, $entity->getGroupId());
        $this->assertSame(1, $entity->getAggregateId());
        $this->assertSame(1, $entity->getRoundId());
        $this->assertSame(1, $entity->getStateId());
        $this->assertSame(1, $entity->getVenueId());
        $this->assertSame('name', $entity->getName());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getStartAt());
        $this->assertSame('result info', $entity->getResultInfo());
        $this->assertSame('leg', $entity->getLeg());
        $this->assertSame('details', $entity->getDetails());
        $this->assertSame(90, $entity->getLength());
        $this->assertSame(false, $entity->isPlaceholder());
        $this->assertSame(false, $entity->hasOdds());
        $this->assertSame(false, $entity->hasPremiumOdds());
    }
}