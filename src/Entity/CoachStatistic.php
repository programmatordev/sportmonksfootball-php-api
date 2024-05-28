<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class CoachStatistic extends ParticipantStatistic
{
    use EntityTrait;

    private int $coachId;

    private int $teamId;

    /** @var ?CoachStatisticDetail[] */
    private ?array $details;

    private ?Coach $coach;

    private ?Team $team;

    public function __construct(array $data, string $timezone)
    {
        parent::__construct($data, $timezone);

        $this->coachId = $data['coach_id'];
        $this->teamId = $data['team_id'];

        // include
        $this->details = isset($data['details']) ? $this->createEntityCollection(CoachStatisticDetail::class, $data['details']) : null;
        $this->coach = isset($data['coach']) ? new Coach($data['coach'], $timezone) : null;
        $this->team = isset($data['team']) ? new Team($data['team'], $timezone) : null;
    }

    public function getCoachId(): int
    {
        return $this->coachId;
    }

    public function getTeamId(): int
    {
        return $this->teamId;
    }

    public function getDetails(): ?array
    {
        return $this->details;
    }

    public function getCoach(): ?Coach
    {
        return $this->coach;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }
}