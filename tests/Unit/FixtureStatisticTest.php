<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\FixtureStatistic;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class FixtureStatisticTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new FixtureStatistic([
            'id' => 1,
            'fixture_id' => 1,
            'type_id' => 1,
            'fixture_statistics_id' => 1,
            'participant_id' => 1,
            'period_id' => 1,
            'data' => ['data' => 'test'],
            'location' => 'home'
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getFixtureId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(1, $entity->getFixtureStatisticId());
        $this->assertSame(1, $entity->getParticipantId());
        $this->assertSame(1, $entity->getPeriodId());
        $this->assertSame(['data' => 'test'], $entity->getData());
        $this->assertSame('home', $entity->getLocation());
    }
}