<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class CoachStatistic extends ParticipantStatistic
{
    use CreateEntityCollectionTrait;

    private int $coachId;

    private int $teamId;

    /** @var ?CoachStatisticDetail[] */
    private ?array $details;

    private ?Coach $coach;

    private ?Team $team;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->coachId = $data['coach_id'];
        $this->teamId = $data['team_id'];

        // include
        $this->details = isset($data['details']) ? $this->createEntityCollection(CoachStatisticDetail::class, $data['details']) : null;
        $this->coach = isset($data['coach']) ? new Coach($data['coach']) : null;
        $this->team = isset($data['team']) ? new Team($data['team']) : null;
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