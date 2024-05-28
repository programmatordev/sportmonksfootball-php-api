<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Bookmaker
{
    private int $id;

    private ?int $legacyId;

    private ?string $name;

    public function __construct(array $data)
    {
        $this->id = $data['id'];

        // select
        $this->legacyId = $data['legacy_id'] ?? null;
        $this->name = $data['name'] ?? null;
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
}