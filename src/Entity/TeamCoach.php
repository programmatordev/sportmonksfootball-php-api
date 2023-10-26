<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class TeamCoach
{
    private int $id;

    private int $teamId;

    private int $coachId;

    private int $positionId;

    private ?bool $isActive;

    private ?\DateTimeImmutable $startedAt;

    private ?\DateTimeImmutable $endedAt;

    private ?bool $isTemporary;

    private ?Team $team;

    private ?Coach $coach;

    private ?Type $position;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->teamId = $data['team_id'];
        $this->coachId = $data['coach_id'];
        $this->positionId = $data['position_id'];

        // select
        $this->isActive = $data['active'] ?? null;
        $this->startedAt = isset($data['start']) ? new \DateTimeImmutable($data['start']) : null;
        $this->endedAt = isset($data['end']) ? new \DateTimeImmutable($data['end']) : null;
        $this->isTemporary = $data['temporary'] ?? null;

        // include
        $this->team = isset($data['team']) ? new Team($data['team'], $timezone) : null;
        $this->coach = isset($data['coach']) ? new Coach($data['coach'], $timezone) : null;
        $this->position = isset($data['position']) ? new Type($data['position']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getCoachId(): int
    {
        return $this->coachId;
    }

    public function getPositionId(): int
    {
        return $this->positionId;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function getStartedAt(): ?\DateTimeImmutable
    {
        return $this->startedAt;
    }

    public function getEndedAt(): ?\DateTimeImmutable
    {
        return $this->endedAt;
    }

    public function isTemporary(): ?bool
    {
        return $this->isTemporary;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function getCoach(): ?Coach
    {
        return $this->coach;
    }

    public function getPosition(): ?Type
    {
        return $this->position;
    }
}