<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Squad
{
    private int $id;

    private ?int $transferId;

    private int $playerId;

    private int $teamId;

    private int $positionId;

    private ?int $detailedPositionId;

    private ?\DateTimeImmutable $startingAt;

    private ?\DateTimeImmutable $endingAt;

    private ?bool $isCaptain;

    private ?int $jerseyNumber;

    private ?Team $team;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->transferId = $data['transfer_id'] ?? null;
        $this->playerId = $data['player_id'];
        $this->teamId = $data['team_id'];
        $this->positionId = $data['position_id'];
        $this->detailedPositionId = $data['detailed_position_id'] ?? null;

        // select
        $this->startingAt = isset($data['start']) ? new \DateTimeImmutable($data['start']) : null;
        $this->endingAt = isset($data['end']) ? new \DateTimeImmutable($data['end']) : null;
        $this->isCaptain = $data['captain'] ?? null;
        $this->jerseyNumber = $data['jersey_number'] ?? null;

        // include
        $this->team = isset($data['team']) ? new Team($data['team']) : null;

        // TODO player, position, detailedPosition, transfer
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
}