<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Transfer;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class TransferTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Transfer([
            'id' => 1,
            'sport_id' => 1,
            'player_id' => 1,
            'type_id' => 1,
            'from_team_id' => 1,
            'to_team_id' => 1,
            'position_id' => 1,
            'detailed_position_id' => 1,
            'date' => '2024-01-01',
            'career_ended' => false,
            'completed' => true,
            'amount' => 1000000
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSportId());
        $this->assertSame(1, $entity->getPlayerId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(1, $entity->getFromTeamId());
        $this->assertSame(1, $entity->getToTeamId());
        $this->assertSame(1, $entity->getPositionId());
        $this->assertSame(1, $entity->getDetailedPositionId());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getDate());
        $this->assertSame(false, $entity->hasCareerEnded());
        $this->assertSame(true, $entity->isCompleted());
        $this->assertSame(1000000, $entity->getAmount());
    }
}
