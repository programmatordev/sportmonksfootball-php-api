<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit\Response;

use ProgrammatorDev\SportMonksFootball\Entity\RateLimit;
use ProgrammatorDev\SportMonksFootball\Entity\Response\AbstractResponse;
use ProgrammatorDev\SportMonksFootball\Entity\Subscription;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class AbstractResponseTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new AbstractResponse([
            'subscription' => [
                [
                    'meta' => [],
                    'plans' => [
                        [
                            'plan' => 'name',
                            'sport' => 'sport',
                            'category' => 'category'
                        ]
                    ],
                    'add_ons' => [],
                    'widgets' => []
                ]
            ],
            'rate_limit' => [
                'resets_in_seconds' => 3600,
                'remaining' => 2999,
                'requested_entity' => 'Test'
            ],
            'timezone' => 'UTC'
        ]);

        $this->assertContainsOnlyInstancesOf(Subscription::class, $entity->getSubscriptions());
        $this->assertInstanceOf(RateLimit::class, $entity->getRateLimit());
        $this->assertSame('UTC', $entity->getTimezone());
    }
}