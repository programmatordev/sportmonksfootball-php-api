<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Standing;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class StandingTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Standing([
            'id' => 1,
            'participant_id' => 1,
            'sport_id' => 1,
            'league_id' => 1,
            'season_id' => 1,
            'stage_id' => 1,
            'group_id' => 1,
            'round_id' => 1,
            'standing_rule_id' => 1,
            'position' => 1,
            'result' => 'equal',
            'points' => 100
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getParticipantId());
        $this->assertSame(1, $entity->getSportId());
        $this->assertSame(1, $entity->getLeagueId());
        $this->assertSame(1, $entity->getSeasonId());
        $this->assertSame(1, $entity->getStageId());
        $this->assertSame(1, $entity->getGroupId());
        $this->assertSame(1, $entity->getRoundId());
        $this->assertSame(1, $entity->getStandingRuleId());
        $this->assertSame(1, $entity->getPosition());
        $this->assertSame('equal', $entity->getResult());
        $this->assertSame(100, $entity->getPoints());
    }
}