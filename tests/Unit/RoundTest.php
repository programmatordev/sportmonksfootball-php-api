<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Round;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class RoundTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Round([
            'id' => 1,
            'sport_id' => 1,
            'league_id' => 1,
            'season_id' => 1,
            'stage_id' => 1,
            'name' => 'name',
            'finished' => true,
            'is_current' => false,
            'starting_at' => '2024-01-01 16:00:00',
            'ending_at' => '2024-01-07 16:00:00',
            'games_in_current_week' => false
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSportId());
        $this->assertSame(1, $entity->getLeagueId());
        $this->assertSame(1, $entity->getSeasonId());
        $this->assertSame(1, $entity->getStageId());
        $this->assertSame('name', $entity->getName());
        $this->assertSame(true, $entity->hasFinished());
        $this->assertSame(false, $entity->isCurrent());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getStartingAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getEndingAt());
        $this->assertSame(false, $entity->hasGamesInCurrentWeek());
    }
}