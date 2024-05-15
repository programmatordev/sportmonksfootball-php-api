<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\RateLimit;
use ProgrammatorDev\SportMonksFootball\Entity\Subscription;
use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class AbstractResponse
{
    use EntityTrait;

    private array $subscriptions;

    private RateLimit $rateLimit;

    private string $timezone;

    public function __construct(array $data)
    {
        $this->subscriptions = $this->createEntityCollection(Subscription::class, $data['subscription']);
        $this->rateLimit = new RateLimit($data['rate_limit']);
        $this->timezone = $data['timezone'];
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