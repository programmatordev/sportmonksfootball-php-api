<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Trophy
{
    private int $id;

    private ?int $sportId;

    private ?int $position;

    private ?string $name;

    public function __construct(array $data)
    {
        $this->id = $data['id'];

        // select
        $this->sportId = $data['sport_id'] ?? null;
        $this->position = $data['position'] ?? null;
        $this->name = $data['name'] ?? null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSportId(): ?int
    {
        return $this->sportId;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}