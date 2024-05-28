<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\StandingCorrection;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class StandingCorrectionTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new StandingCorrection([
            'id' => 1,
            'season_id' => 1,
            'stage_id' => 1,
            'group_id' => 1,
            'type_id' => 1,
            'participant_id' => 1,
            'participant_type' => 'team',
            'value' => 10,
            'calc_type' => '+',
            'active' => false
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getSeasonId());
        $this->assertSame(1, $entity->getStageId());
        $this->assertSame(1, $entity->getGroupId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(1, $entity->getParticipantId());
        $this->assertSame('team', $entity->getParticipantType());
        $this->assertSame(10, $entity->getValue());
        $this->assertSame('+', $entity->getCalcType());
        $this->assertSame(false, $entity->isActive());
    }
}