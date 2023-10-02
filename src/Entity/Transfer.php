<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Transfer
{
    private int $id;

    private int $sportId;

    private int $playerId;

    private int $typeId;

    private int $fromTeamId;

    private int $toTeamId;

    private ?int $positionId;

    private ?int $detailedPositionId;

    private ?\DateTimeImmutable $date;

    private ?bool $hasCareerEnded;

    private ?bool $isCompleted;

    private ?int $amount;

    private ?Sport $sport;

    private ?Player $player;

    private ?Type $type;

    private ?Team $fromTeam;

    private ?Team $toTeam;

    private ?Type $position;

    private ?Type $detailedPosition;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->playerId = $data['player_id'];
        $this->typeId = $data['type_id'];
        $this->fromTeamId = $data['from_team_id'];
        $this->toTeamId = $data['to_team_id'];
        $this->positionId = $data['position_id'] ?? null;
        $this->detailedPositionId = $data['detailed_position_id'] ?? null;

        // select
        $this->date = isset($data['date']) ? new \DateTimeImmutable($data['date']) : null;
        $this->hasCareerEnded = $data['career_ended'] ?? null;
        $this->isCompleted = $data['completed'] ?? null;
        $this->amount = $data['amount'] ?? null;

        // include
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;
        $this->player = isset($data['player']) ? new Player($data['player']) : null;
        $this->type = isset($data['type']) ? new Type($data['type']) : null;
        $this->fromTeam = isset($data['fromteam']) ? new Team($data['fromteam']) : null;
        $this->toTeam = isset($data['toteam']) ? new Team($data['toteam']) : null;
        $this->position = isset($data['position']) ? new Type($data['position']) : null;
        $this->detailedPosition = isset($data['detailedposition']) ? new Type($data['detailedposition']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSportId(): int
    {
        return $this->sportId;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getFromTeamId(): int
    {
        return $this->fromTeamId;
    }

    public function getToTeamId(): int
    {
        return $this->toTeamId;
    }

    public function getPositionId(): ?int
    {
        return $this->positionId;
    }

    public function getDetailedPositionId(): ?int
    {
        return $this->detailedPositionId;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function hasCareerEnded(): ?bool
    {
        return $this->hasCareerEnded;
    }

    public function isCompleted(): ?bool
    {
        return $this->isCompleted;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function getFromTeam(): ?Team
    {
        return $this->fromTeam;
    }

    public function getToTeam(): ?Team
    {
        return $this->toTeam;
    }

    public function getPosition(): ?Type
    {
        return $this->position;
    }

    public function getDetailedPosition(): ?Type
    {
        return $this->detailedPosition;
    }
}