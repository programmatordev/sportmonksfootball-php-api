<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Event;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class EventTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Event([
            'id' => 1,
            'type_id' => 1,
            'sub_type_id' => 1,
            'player_id' => 1,
            'related_player_id' => 1,
            'period_id' => 1,
            'detailed_period_id' => 1,
            'participant_id' => 1,
            'sort_order' => 1,
            'section' => 'section',
            'player_name' => 'player name',
            'related_player_name' => 'related player name',
            'result' => '1-1',
            'info' => 'info',
            'addition' => 'addition',
            'minute' => 45,
            'extra_minute' => 2,
            'injured' => false,
            'on_bench' => false,
            'rescinded' => false,
            'coach_id' => 1
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(1, $entity->getSubTypeId());
        $this->assertSame(1, $entity->getPlayerId());
        $this->assertSame(1, $entity->getRelatedPlayerId());
        $this->assertSame(1, $entity->getPeriodId());
        $this->assertSame(1, $entity->getDetailedPeriodId());
        $this->assertSame(1, $entity->getParticipantId());
        $this->assertSame(1, $entity->getSortOrder());
        $this->assertSame('section', $entity->getSection());
        $this->assertSame('player name', $entity->getPlayerName());
        $this->assertSame('related player name', $entity->getRelatedPlayerName());
        $this->assertSame('1-1', $entity->getResult());
        $this->assertSame('info', $entity->getInfo());
        $this->assertSame('addition', $entity->getAdditionalInfo());
        $this->assertSame(45, $entity->getMinute());
        $this->assertSame(2, $entity->getExtraMinute());
        $this->assertSame(false, $entity->isInjured());
        $this->assertSame(false, $entity->isOnBench());
        $this->assertSame(false, $entity->isRescinded());
        $this->assertSame(1, $entity->getCoachId());
    }
}