<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Market
{
    private int $id;

    private ?int $legacyId;

    private ?string $name;

    private ?string $developerName;

    private ?bool $hasWinningCalculations;

    public function __construct(array $data)
    {
        $this->id = $data['id'];

        // select
        $this->legacyId = $data['legacy_id'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->developerName = $data['developer_name'] ?? null;
        $this->hasWinningCalculations = $data['has_winning_calculations'] ?? null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLegacyId(): ?int
    {
        return $this->legacyId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDeveloperName(): ?string
    {
        return $this->developerName;
    }

    public function hasWinningCalculations(): ?bool
    {
        return $this->hasWinningCalculations;
    }
}