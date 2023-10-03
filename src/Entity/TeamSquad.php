<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class TeamSquad
{
    private int $id;

    private ?int $transferId;

    private int $playerId;

    private int $teamId;

    private ?int $positionId;

    private ?int $detailedPositionId;

    private ?\DateTimeImmutable $startingAt;

    private ?\DateTimeImmutable $endingAt;

    private ?bool $isCaptain;

    private ?int $jerseyNumber;

    private ?Team $team;

    private ?Player $player;

    private ?Type $position;

    private ?Type $detailedPosition;

    private ?Transfer $transfer;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->transferId = $data['transfer_id'] ?? null;
        $this->playerId = $data['player_id'];
        $this->teamId = $data['team_id'];
        $this->positionId = $data['position_id'] ?? null;
        $this->detailedPositionId = $data['detailed_position_id'] ?? null;

        // select
        $this->startingAt = isset($data['start']) ? new \DateTimeImmutable($data['start']) : null;
        $this->endingAt = isset($data['end']) ? new \DateTimeImmutable($data['end']) : null;
        $this->isCaptain = $data['captain'] ?? null;
        $this->jerseyNumber = $data['jersey_number'] ?? null;

        // include
        $this->team = isset($data['team']) ? new Team($data['team']) : null;
        $this->player = isset($data['player']) ? new Player($data['player']) : null;
        $this->position = isset($data['position']) ? new Type($data['position']) : null;
        $this->detailedPosition = isset($data['detailedposition']) ? new Type($data['detailedposition']) : null;
        $this->transfer = isset($data['transfer']) ? new Transfer($data['transfer']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTransferId(): ?int
    {
        return $this->transferId;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getPositionId(): int
    {
        return $this->positionId;
    }

    public function getDetailedPositionId(): ?int
    {
        return $this->detailedPositionId;
    }

    public function getStartingAt(): ?\DateTimeImmutable
    {
        return $this->startingAt;
    }

    public function getEndingAt(): ?\DateTimeImmutable
    {
        return $this->endingAt;
    }

    public function isCaptain(): ?bool
    {
        return $this->isCaptain;
    }

    public function getJerseyNumber(): ?int
    {
        return $this->jerseyNumber;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function getPosition(): ?Type
    {
        return $this->position;
    }

    public function getDetailedPosition(): ?Type
    {
        return $this->detailedPosition;
    }

    public function getTransfer(): ?Transfer
    {
        return $this->transfer;
    }
}