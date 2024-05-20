<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Commentary;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class CommentaryTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Commentary([
            'id' => 1,
            'fixture_id' => 1,
            'comment' => 'comment',
            'minute' => 10,
            'extra_minute' => 1,
            'is_goal' => true,
            'is_important' => true,
            'order' => 1
        ], 'UTC');

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getFixtureId());
        $this->assertSame('comment', $entity->getComment());
        $this->assertSame(10, $entity->getMinute());
        $this->assertSame(1, $entity->getExtraMinute());
        $this->assertSame(true, $entity->isGoal());
        $this->assertSame(true, $entity->isImportant());
        $this->assertSame(1, $entity->getSortOrder());
    }
}