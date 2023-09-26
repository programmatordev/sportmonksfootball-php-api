<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Fixture
{
    private int $id;

    private int $sportId;

    private int $leagueId;

    private int $seasonId;

    private int $stageId;

    private ?int $groupId;

    private ?int $aggregateId;

    private ?int $roundId;

    private int $stateId;

    private ?int $venueId;

    private ?string $name;

    private ?\DateTimeImmutable $startingAt;

    private ?string $resultInfo;

    private ?string $leg;

    private ?string $details;

    private ?int $length;

    private ?bool $isPlaceholder;

    private ?bool $hasOdds;

    private ?Sport $sport;

    private ?Stage $stage;

    private ?League $league;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->leagueId = $data['league_id'];
        $this->seasonId = $data['season_id'];
        $this->stageId = $data['stage_id'];
        $this->groupId = $data['group_id'] ?? null;
        $this->aggregateId = $data['aggregate_id'] ?? null;
        $this->roundId = $data['round_id'] ?? null;
        $this->stateId = $data['state_id'];
        $this->venueId = $data['venue_id'] ?? null;

        // select
        $this->name = $data['name'] ?? null;
        $this->startingAt = isset($data['starting_at']) ? new \DateTimeImmutable($data['starting_at']) : null;
        $this->resultInfo = $data['result_info'] ?? null;
        $this->leg = $data['leg'] ?? null;
        $this->details = $data['details'] ?? null;
        $this->length = $data['length'] ?? null;
        $this->isPlaceholder = $data['placeholder'] ?? null;
        $this->hasOdds = $data['has_odds'] ?? null;

        // include
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;
        $this->stage = isset($data['stage']) ? new Stage($data['stage']) : null;
        $this->league = isset($data['league']) ? new League($data['league']) : null;

        // TODO round, group, aggregate, season, venue, state, weatherReport, lineups, events,
        // timeline, comments, trends, statistics, periods, participants, odds, inplayOdds, portmatchNews, prematchNews,
        // metadata, tvStations, predictions, referees, formations, ballCoordinated, sidelined,scores
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSportId(): int
    {
        return $this->sportId;
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

    public function getGroupId(): ?int
    {
        return $this->groupId;
    }

    public function getAggregateId(): ?int
    {
        return $this->aggregateId;
    }

    public function getRoundId(): ?int
    {
        return $this->roundId;
    }

    public function getStateId(): int
    {
        return $this->stateId;
    }

    public function getVenueId(): ?int
    {
        return $this->venueId;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getStartingAt(): ?\DateTimeImmutable
    {
        return $this->startingAt;
    }

    public function getResultInfo(): ?string
    {
        return $this->resultInfo;
    }

    public function getLeg(): ?string
    {
        return $this->leg;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function isPlaceholder(): ?bool
    {
        return $this->isPlaceholder;
    }

    public function hasOdds(): ?bool
    {
        return $this->hasOdds;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    public function getLeague(): ?League
    {
        return $this->league;
    }
}