<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Period;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class PeriodTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Period([
            'id' => 1,
            'fixture_id' => 1,
            'type_id' => 1,
            'has_timer' => false,
            'started' => 1716206474,
            'ended' => 1716209274,
            'counts_from' => 0,
            'ticking' => false,
            'sort_order' => 1,
            'description' => 'description',
            'time_added' => 1,
            'period_length' => 45,
            'minutes' => 46,
            'seconds' => 40
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getFixtureId());
        $this->assertSame(1, $entity->getTypeId());
        $this->assertSame(false, $entity->hasTimer());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getStartedAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $entity->getEndedAt());
        $this->assertSame(0, $entity->getCountsFrom());
        $this->assertSame(false, $entity->isTicking());
        $this->assertSame(1, $entity->getSortOrder());
        $this->assertSame('description', $entity->getDescription());
        $this->assertSame(1, $entity->getTimeAdded());
        $this->assertSame(45, $entity->getPeriodLength());
        $this->assertSame(46, $entity->getMinutes());
        $this->assertSame(40, $entity->getSeconds());
    }
}