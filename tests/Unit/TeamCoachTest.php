<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\TeamCoach;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class TeamCoachTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new TeamCoach([
            'id' => 1,
            'team_id' => 1,
            'coach_id' => 1,
            'position_id' => 1,
            'active' => false,
            'start' => '2024-01-01 16:00:00',
            'end' => '2024-01-07 16:00:00',
            'temporary' => false
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getTeamId());
        $this->assertSame(1, $entity->getCoachId());
        $this->assertSame(1, $entity->getPositionId());
        $this->assertSame(false, $entity->isActive());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getStartedAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getEndedAt());
        $this->assertSame(false, $entity->isTemporary());
    }
}