<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Aggregate
{
    private int $id;

    private int $leagueId;

    private int $seasonId;

    private int $stageId;

    private ?string $name;

    /** @var ?int[] */
    private ?array $fixtureIds;

    private ?string $result;

    private ?string $detail;

    private ?int $winnerParticipantId;

    private ?League $league;

    private ?Season $season;

    private ?Stage $stage;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->leagueId = $data['league_id'];
        $this->seasonId = $data['season_id'];
        $this->stageId = $data['stage_id'];

        $this->name = $data['name'] ?? null;
        $this->fixtureIds = $data['fixture_ids'] ?? null;
        $this->result = $data['result'] ?? null;
        $this->detail = $data['detail'] ?? null;
        $this->winnerParticipantId = $data['winner_participant_id'] ?? null;

        // include
        $this->league = isset($data['league']) ? new League($data['league']) : null;
        $this->season = isset($data['season']) ? new Season($data['season']) : null;
        $this->stage = isset($data['stage']) ? new Stage($data['stage']) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLeagueId(): int
    {
        return $this->leagueId;
    }

    public function getSeasonId(): int
    {
        return $this->seasonId;
    }

    public function getStageId(): int
    {
        return $this->stageId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getFixtureIds(): ?array
    {
        return $this->fixtureIds;
    }

    public function getResult(): ?string
    {
        return $this->result;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function getWinnerParticipantId(): ?int
    {
        return $this->winnerParticipantId;
    }

    public function getLeague(): ?League
    {
        return $this->league;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function getStage(): ?Stage
    {
        return $this->stage;
    }
}