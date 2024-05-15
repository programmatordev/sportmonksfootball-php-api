<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\RateLimit;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class RateLimitTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new RateLimit([
            'resets_in_seconds' => 3600,
            'remaining' => 2999,
            'requested_entity' => 'Test'
        ]);

        $this->assertSame(3600, $entity->getSecondsToReset());
        $this->assertSame(2999, $entity->getRemainingNumRequests());
        $this->assertSame('Test', $entity->getRequestedEntity());
    }
}