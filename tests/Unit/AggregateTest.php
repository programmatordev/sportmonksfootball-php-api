<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Aggregate;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class AggregateTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Aggregate([
            'id' => 1,
            'league_id' => 1,
            'season_id' => 1,
            'stage_id' => 1,
            'name' => 'name',
            'fixture_ids' => [1, 2],
            'result' => 'result',
            'detail' => 'detail',
            'winner_participant_id' => 1
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getLeagueId());
        $this->assertSame(1, $entity->getSeasonId());
        $this->assertSame(1, $entity->getStageId());
        $this->assertSame('name', $entity->getName());
        $this->assertSame([1, 2], $entity->getFixtureIds());
        $this->assertSame('result', $entity->getResult());
        $this->assertSame('detail', $entity->getDetail());
        $this->assertSame(1, $entity->getWinnerParticipantId());
    }
}