<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class PlayerStatistic extends Statistic
{
    use CreateEntityCollectionTrait;

    private int $playerId;

    private int $teamId;

    private ?int $positionId;

    private ?bool $hasValues;

    private ?int $jerseyNumber;

    /** @var PlayerStatisticDetail[] */
    private array $details;

    private ?Player $player;

    private ?Team $team;

    private ?Type $position;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->playerId = $data['player_id'];
        $this->teamId = $data['team_id'];
        $this->positionId = $data['position_id'] ?? null;
        $this->details = $this->createEntityCollection(PlayerStatisticDetail::class, $data['details']);

        // select
        $this->hasValues = $data['has_values'] ?? null;
        $this->jerseyNumber = $data['jersey_number'] ?? null;

        // include
        $this->player = isset($data['player']) ? new Player($data['player']) : null;
        $this->team = isset($data['team']) ? new Team($data['team']) : null;
        $this->position = isset($data['position']) ? new Type($data['position']) : null;
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getPositionId(): ?int
    {
        return $this->positionId;
    }

    public function hasValues(): ?bool
    {
        return $this->hasValues;
    }

    public function getJerseyNumber(): ?int
    {
        return $this->jerseyNumber;
    }

    public function getDetails(): array
    {
        return $this->details;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function getPosition(): ?Type
    {
        return $this->position;
    }
}