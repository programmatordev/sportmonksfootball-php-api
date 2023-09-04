<?php

namespace ProgrammatorDev\SportMonksFootball\Exception;

use ProgrammatorDev\SportMonksFootball\Entity\RateLimit;
use ProgrammatorDev\SportMonksFootball\Entity\Response\Error;
use ProgrammatorDev\SportMonksFootball\Entity\Subscription;

class NoResultsFoundException extends ApiErrorException
{
    public function __construct(private readonly Error $error)
    {
        parent::__construct($this->error->getMessage());
    }

    /**
     * @return Subscription[]
     */
    public function getSubscriptions(): array
    {
        return $this->error->getSubscriptions();
    }

    public function getRateLimit(): RateLimit
    {
        return $this->error->getRateLimit();
    }

    public function getTimezone(): string
    {
        return $this->error->getTimezone();
    }
}