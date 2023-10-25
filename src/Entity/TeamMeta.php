<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class TeamMeta
{
    private string $location;

    private bool $isWinner;

    private ?int $position;

    public function __construct(array $data)
    {
        $this->location = $data['location'];
        $this->isWinner = $data['winner'];
        $this->position = $data['position'] ?? null;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function isWinner(): bool
    {
        return $this->isWinner;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }
}