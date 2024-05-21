<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Group;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class GroupTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Group([
            'id' => 1,
            'sport_id' => 1,
            'league_id' => 1,
            'season_id' => 1,
            'stage_id' => 1,
            'name' => 'name',
            'starting_at' => '2024-01-01 16:00:00',
            'ending_at' => '2024-01-02 16:00:00',
            'games_in_current_week' => false,
            'is_current' => false,
            'finished' => false,
            'pending' => false
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSportId());
        $this->assertSame(1, $entity->getLeagueId());
        $this->assertSame(1, $entity->getSeasonId());
        $this->assertSame(1, $entity->getStageId());
        $this->assertSame('name', $entity->getName());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getStartingAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getEndingAt());
        $this->assertSame(false, $entity->hasGamesInCurrentWeek());
        $this->assertSame(false, $entity->isCurrent());
        $this->assertSame(false, $entity->hasFinished());
        $this->assertSame(false, $entity->isPending());
    }
}