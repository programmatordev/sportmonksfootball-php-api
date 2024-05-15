<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Bookmaker;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class BookmakerTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Bookmaker([
            'id' => 1,
            'legacy_id' => 1,
            'name' => 'name'
        ]);

        $this->assertSame(1, $entity->getId());
        $this->assertSame(1, $entity->getLegacyId());
        $this->assertSame('name', $entity->getName());
    }
}