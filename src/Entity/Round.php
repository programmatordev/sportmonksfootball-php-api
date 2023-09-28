<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

use ProgrammatorDev\SportMonksFootball\Util\CreateEntityCollectionTrait;

class Round
{
    use CreateEntityCollectionTrait;

    private int $id;

    private int $sportId;

    private int $leagueId;

    private int $seasonId;

    private int $stageId;

    private ?string $name;

    private ?bool $isFinished;

    private ?bool $isCurrent;

    private ?\DateTimeImmutable $startingAt;

    private ?\DateTimeImmutable $endingAt;

    private ?bool $hasGamesInCurrentWeek;

    private ?Sport $sport;

    private ?League $league;

    private ?Season $season;

    private ?Stage $stage;

    /** @var ?Fixture[] */
    private ?array $fixtures;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->leagueId = $data['league_id'];
        $this->seasonId = $data['season_id'];
        $this->stageId = $data['stage_id'];

        // select
        $this->name = $data['name'] ?? null;
        $this->isFinished = $data['finished'] ?? null;
        $this->isCurrent = $data['is_current'] ?? null;
        $this->startingAt = isset($data['starting_at']) ? new \DateTimeImmutable($data['starting_at']) : null;
        $this->endingAt = isset($data['ending_at']) ? new \DateTimeImmutable($data['ending_at']) : null;
        $this->hasGamesInCurrentWeek = $data['games_in_current_week'] ?? null;

        // include
        $this->sport = isset($data['sport']) ? new Sport($data['sport']) : null;
        $this->league = isset($data['league']) ? new League($data['league']) : null;
        $this->season = isset($data['season']) ? new Season($data['season']) : null;
        $this->stage = isset($data['stage']) ? new Stage($data['stage']) : null;
        $this->fixtures = isset($data['fixtures']) ? $this->createEntityCollection(Fixture::class, $data['fixtures']) : null;

        // TODO statistics
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

    public function isFinished(): ?bool
    {
        return $this->isFinished;
    }

    public function isCurrent(): ?bool
    {
        return $this->isCurrent;
    }

    public function getStartingAt(): ?\DateTimeImmutable
    {
        return $this->startingAt;
    }

    public function getEndingAt(): ?\DateTimeImmutable
    {
        return $this->endingAt;
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
}