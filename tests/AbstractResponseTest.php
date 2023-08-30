<?php

namespace ProgrammatorDev\SportMonksFootball\Test;

use Nyholm\Psr7\Response;
use ProgrammatorDev\SportMonksFootball\Entity\Pagination;
use ProgrammatorDev\SportMonksFootball\Entity\Plan;
use ProgrammatorDev\SportMonksFootball\Entity\RateLimit;
use ProgrammatorDev\SportMonksFootball\Entity\Response\AbstractCollectionResponse;
use ProgrammatorDev\SportMonksFootball\Entity\Response\AbstractResponse;
use ProgrammatorDev\SportMonksFootball\Entity\Subscription;
use ProgrammatorDev\SportMonksFootball\HttpClient\ResponseMediator;

class AbstractResponseTest extends AbstractTest
{
    public function testAbstractResponse()
    {
        $response = new Response(body: MockResponse::ABSTRACT_RESPONSE);
        $abstractResponse = new AbstractResponse(ResponseMediator::toArray($response));

        $this->assertAbstractResponse($abstractResponse);
    }

    public function testAbstractCollectionResponse()
    {
        $response = new Response(body: MockResponse::ABSTRACT_RESPONSE);
        $abstractResponse = new AbstractCollectionResponse(ResponseMediator::toArray($response));

        $pagination = $abstractResponse->getPagination();
        $this->assertInstanceOf(Pagination::class, $pagination);
        $this->assertSame(7, $pagination->getCount());
        $this->assertSame(50, $pagination->getPerPage());
        $this->assertSame(1, $pagination->getCurrentPage());
        $this->assertSame(null, $pagination->getNextPage());
        $this->assertSame(false, $pagination->hasMore());

        $this->assertAbstractResponse($abstractResponse);
    }

    private function assertAbstractResponse(AbstractResponse $abstractResponse): void
    {
        $subscriptions = $abstractResponse->getSubscriptions();
        $this->assertContainsOnlyInstancesOf(Subscription::class, $subscriptions);
        $this->assertSame([], $subscriptions[0]->getMeta());
        $this->assertSame([], $subscriptions[0]->getAddOns());
        $this->assertSame([], $subscriptions[0]->getWidgets());

        $plans = $subscriptions[0]->getPlans();
        $this->assertContainsOnlyInstancesOf(Plan::class, $plans);
        $this->assertSame('Football Free Plan', $plans[0]->getName());
        $this->assertSame('Football', $plans[0]->getSport());
        $this->assertSame('Standard', $plans[0]->getCategory());

        $rateLimit = $abstractResponse->getRateLimit();
        $this->assertInstanceOf(RateLimit::class, $rateLimit);
        $this->assertSame(3600, $rateLimit->getSecondsToReset());
        $this->assertSame(2999, $rateLimit->getRemainingNumRequests());
        $this->assertSame('Continent', $rateLimit->getRequestedEntity());

        $this->assertSame('UTC', $abstractResponse->getTimezone());
    }
}