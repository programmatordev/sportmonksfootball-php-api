<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class TeamStatistic extends ParticipantStatistic
{
    use CreateEntityCollectionTrait;

    private int $teamId;

    private ?bool $hasValues;

    /** @var ?TeamStatisticDetail[] */
    private ?array $details;

    private ?Team $team;

    public function __construct(array $data, string $timezone)
    {
        parent::__construct($data, $timezone);

        $this->teamId = $data['team_id'];

        // select
        $this->hasValues = $data['has_values'] ?? null;

        // include
        $this->details = isset($data['details']) ? $this->createEntityCollection(TeamStatisticDetail::class, $data['details']) : null;
        $this->team = isset($data['team']) ? new Team($data['team'], $timezone) : null;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function hasValues(): ?bool
    {
        return $this->hasValues;
    }

    public function getDetails(): ?array
    {
        return $this->details;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }
}