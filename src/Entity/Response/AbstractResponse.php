<?php

namespace ProgrammatorDev\SportMonksFootball\Entity\Response;

use ProgrammatorDev\SportMonksFootball\Entity\Pagination;
use ProgrammatorDev\SportMonksFootball\Entity\RateLimit;
use ProgrammatorDev\SportMonksFootball\Entity\Subscription;
use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class AbstractResponse
{
    use CreateEntityCollectionTrait;

    private ?Pagination $pagination;

    private array $subscriptions;

    private RateLimit $rateLimit;

    private string $timezone;

    public function __construct(array $response)
    {
        $this->pagination = isset($response['pagination'])
            ? new Pagination($response['pagination'])
            : null;
        $this->subscriptions = $this->createEntityCollection($response['subscription'], Subscription::class);
        $this->rateLimit = new RateLimit($response['rate_limit']);
        $this->timezone = $response['timezone'];
    }

    public function getPagination(): ?Pagination
    {
        return $this->pagination;
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