<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\EntityTrait;

class Round
{
    use EntityTrait;

    private int $id;

    private int $sportId;

    private int $leagueId;

    private int $seasonId;

    private int $stageId;

    private ?string $name;

    private ?bool $hasFinished;

    private ?bool $isCurrent;

    private ?\DateTimeImmutable $startAt;

    private ?\DateTimeImmutable $endAt;

    private ?bool $hasGamesInCurrentWeek;

    private ?Sport $sport;

    private ?League $league;

    private ?Season $season;

    private ?Stage $stage;

    /** @var ?Fixture[] */
    private ?array $fixtures;

    /** @var ?Statistic[] */
    private ?array $statistics;

    public function __construct(array $data, string $timezone)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->leagueId = $data['league_id'];
        $this->seasonId = $data['season_id'];
        $this->stageId = $data['stage_id'];

        // select
        $this->name = $data['name'] ?? null;
        $this->hasFinished = $data['finished'] ?? null;
        $this->isCurrent = $data['is_current'] ?? null;
        $this->startAt = isset($data['starting_at']) ? new \DateTimeImmutable($data['starting_at']) : null;
        $this->endAt = isset($data['ending_at']) ? new \DateTimeImmutable($data['ending_at']) : null;
        $this->hasGamesInCurrentWeek = $data['games_in_current_week'] ?? null;

        // include
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;
        $this->league = isset($data['league']) ? new League($data['league'], $timezone) : null;
        $this->season = isset($data['season']) ? new Season($data['season'], $timezone) : null;
        $this->stage = isset($data['stage']) ? new Stage($data['stage'], $timezone) : null;
        $this->fixtures = isset($data['fixtures']) ? $this->createEntityCollection(Fixture::class, $data['fixtures'], $timezone) : null;
        $this->statistics = isset($data['statistics']) ? $this->createEntityCollection(Statistic::class, $data['statistics'], $timezone) : null;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function hasFinished(): ?bool
    {
        return $this->hasFinished;
    }

    public function isCurrent(): ?bool
    {
        return $this->isCurrent;
    }

    public function getStartAt(): ?\DateTimeImmutable
    {
        return $this->startAt;
    }

    public function getEndAt(): ?\DateTimeImmutable
    {
        return $this->endAt;
    }

    public function hasGamesInCurrentWeek(): ?bool
    {
        return $this->hasGamesInCurrentWeek;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
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

    public function getFixtures(): ?array
    {
        return $this->fixtures;
    }

    public function getStatistics(): ?array
    {
        return $this->statistics;
    }
}