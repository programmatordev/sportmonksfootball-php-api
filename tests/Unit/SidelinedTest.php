<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Sidelined;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class SidelinedTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Sidelined([
            'id' => 1,
            'player_id' => 1,
            'type_id' => 1,
            'team_id' => 1,
            'season_id' => 1,
            'category' => 'injury',
            'start_date' => '2024-01-01 00:00:00',
            'end_date' => '2024-01-07 00:00:00',
            'games_missed' => 2,
            'completed' => true
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getPlayerId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(1, $entity->getTeamId());
        $this->assertSame(1, $entity->getSeasonId());
        $this->assertSame('injury', $entity->getCategory());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getStartingAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getEndingAt());
        $this->assertSame(2, $entity->getGamesMissed());
        $this->assertSame(true, $entity->isCompleted());
    }
}