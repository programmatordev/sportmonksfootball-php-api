<?php

namespace ProgrammatorDev\SportMonksFootball\Test\Unit;

use ProgrammatorDev\SportMonksFootball\Entity\Plan;
use ProgrammatorDev\SportMonksFootball\Entity\Subscription;
use ProgrammatorDev\SportMonksFootball\Test\AbstractTest;

class SubscriptionTest extends AbstractTest
{
    public function testMethods(): void
    {
        $entity = new Subscription([
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
        ]);

        $this->assertSame([], $entity->getMeta());
        $this->assertContainsOnlyInstancesOf(Plan::class, $entity->getPlans());
        $this->assertSame([], $entity->getAddOns());
        $this->assertSame([], $entity->getWidgets());
    }
}