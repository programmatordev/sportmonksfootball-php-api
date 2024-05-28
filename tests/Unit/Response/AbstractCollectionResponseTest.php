<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Pagination;
use ProgrammatorDev\SportMonksFootball\Entity\RateLimit;
use ProgrammatorDev\SportMonksFootball\Entity\Response\AbstractCollectionResponse;
use ProgrammatorDev\SportMonksFootball\Entity\Subscription;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class AbstractCollectionResponseTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new AbstractCollectionResponse([
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
            'timezone' => 'UTC',
            'pagination' => [
                'count' => 25,
                'per_page' => 25,
                'current_page' => 1,
                'next_page' => 'https://api.sportmonks.com/v3/test?page=2',
                'has_more' => true
            ]
        ]);

        $this->assertContainsOnlyInstancesOf(Subscription::class, $entity->getSubscriptions());
        $this->assertInstanceOf(RateLimit::class, $entity->getRateLimit());
        $this->assertSame('UTC', $entity->getTimezone());
        $this->assertInstanceOf(Pagination::class, $entity->getPagination());
    }
}