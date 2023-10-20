<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class CoachTeam
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

    public function __construct(array $data)
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
        $this->team = isset($data['team']) ? new Team($data['team']) : null;
        $this->coach = isset($data['coach']) ? new Coach($data['coach']) : null;
        $this->position = isset($data['position']) ? new Type($data['position']) : null;
    }


}