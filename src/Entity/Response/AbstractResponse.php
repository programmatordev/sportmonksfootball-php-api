<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\RateLimit;
use ProgrammatorDev\SportMonksFootball\Entity\Subscription;
use ProgrammatorDev\SportMonksFootball\Util\EntityCollectionTrait;

class AbstractResponse
{
    use EntityCollectionTrait;

    private array $subscriptions;

    private RateLimit $rateLimit;

    private string $timezone;

    public function __construct(array $response)
    {
        $this->subscriptions = $this->createEntityCollection(Subscription::class, $response['subscription']);
        $this->rateLimit = new RateLimit($response['rate_limit']);
        $this->timezone = $response['timezone'];
    }

    /**
     * @return Subscription[]
     */
    public function getSubscriptions(): array
    {
        return $this->subscriptions;
    }

    public function getRateLimit(): RateLimit
    {
        return $this->rateLimit;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }
}