<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Season;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class SeasonTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Season([
            'id' => 1,
            'sport_id' => 1,
            'league_id' => 1,
            'tie_breaker_rule_id' => 1,
            'name' => 'name',
            'finished' => true,
            'pending' => false,
            'is_current' => false,
            'starting_at' => '2024-01-01 16:00:00',
            'ending_at' => '2024-01-07 16:00:00',
            'standings_recalculated_at' => '2024-01-07 17:00:00',
            'games_in_current_week' => false
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSportId());
        $this->assertSame(1, $entity->getLeagueId());
        $this->assertSame(1, $entity->getTieBreakerRuleId());
        $this->assertSame('name', $entity->getName());
        $this->assertSame(true, $entity->hasFinished());
        $this->assertSame(false, $entity->isPending());
        $this->assertSame(false, $entity->isCurrent());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getStartAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getEndAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getStandingsRecalculatedAt());
        $this->assertSame(false, $entity->hasGamesInCurrentWeek());
    }
}