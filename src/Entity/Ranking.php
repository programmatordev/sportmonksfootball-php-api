<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Ranking
{
    private ?int $id;

    private ?int $participantId;

    private ?int $sportId;

    private ?int $position;

    private ?int $points;

    private ?string $type;

    public function __construct(array $data)
    {
        // select
        $this->id = $data['id'] ?? null;
        $this->participantId = $data['participant_id'] ?? null;
        $this->sportId = $data['sport_id'] ?? null;
        $this->position = $data['position'] ?? null;
        $this->points = $data['points'] ?? null;
        $this->type = $data['type'] ?? null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParticipantId(): ?int
    {
        return $this->participantId;
    }

    public function getSportId(): ?int
    {
        return $this->sportId;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
}