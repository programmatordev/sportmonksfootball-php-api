<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\ParticipantTrophy;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class ParticipantTrophyTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new ParticipantTrophy([
            'id' => 1,
            'participant_id' => 1,
            'league_id' => 1,
            'season_id' => 1,
            'trophy_id' => 1
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getParticipantId());
        $this->assertSame(1, $entity->getLeagueId());
        $this->assertSame(1, $entity->getSeasonId());
        $this->assertSame(1, $entity->getTrophyId());
    }
}