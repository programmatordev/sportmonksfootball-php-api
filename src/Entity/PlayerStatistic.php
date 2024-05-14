<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class PlayerStatistic extends ParticipantStatistic
{
    use EntityTrait;

    private int $playerId;

    private int $teamId;

    private ?int $positionId;

    private ?bool $hasValues;

    private ?int $jerseyNumber;

    /** @var ?PlayerStatisticDetail[] */
    private ?array $details;

    private ?Player $player;

    private ?Team $team;

    private ?Type $position;

    public function __construct(array $data, string $timezone)
    {
        parent::__construct($data, $timezone);

        $this->playerId = $data['player_id'];
        $this->teamId = $data['team_id'];
        $this->positionId = $data['position_id'] ?? null;

        // select
        $this->hasValues = $data['has_values'] ?? null;
        $this->jerseyNumber = $data['jersey_number'] ?? null;

        // include
        $this->details = isset($data['details']) ? $this->createEntityCollection(PlayerStatisticDetail::class, $data['details']) : null;
        $this->player = isset($data['player']) ? new Player($data['player'], $timezone) : null;
        $this->team = isset($data['team']) ? new Team($data['team'], $timezone) : null;
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

    public function getDetails(): ?array
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