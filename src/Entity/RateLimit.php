<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class RateLimit
{
    private int $secondsToReset;

    private int $remainingNumRequests;

    private string $requestedEntity;

    public function __construct(array $data)
    {
        $this->secondsToReset = $data['resets_in_seconds'];
        $this->remainingNumRequests = $data['remaining'];
        $this->requestedEntity = $data['requested_entity'];
    }

    public function getSecondsToReset(): int
    {
        return $this->secondsToReset;
    }

    public function getRemainingNumRequests(): int
    {
        return $this->remainingNumRequests;
    }

    public function getRequestedEntity(): string
    {
        return $this->requestedEntity;
    }
}