<?php

namespace ProgrammatorDev\SportMonksFootball\Entity;

class Group
{
    private int $id;

    private int $sportId;

    private int $leagueId;

    private int $seasonId;

    private int $stageId;

    private ?string $name;

    private ?\DateTimeImmutable $startingAt;

    private ?\DateTimeImmutable $endingAt;

    private ?bool $hasGamesInCurrentWeek;

    private ?bool $isCurrent;

    private ?bool $isFinished;

    private ?bool $isPending;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->sportId = $data['sport_id'];
        $this->leagueId = $data['league_id'];
        $this->seasonId = $data['season_id'];
        $this->stageId = $data['stage_id'];

        $this->name = $data['name'] ?? null;
        $this->startingAt = isset($data['starting_at']) ? new \DateTimeImmutable($data['starting_at']) : null;
        $this->endingAt = isset($data['ending_at']) ? new \DateTimeImmutable($data['ending_at']) : null;
        $this->hasGamesInCurrentWeek = $data['games_in_current_week'] ?? null;
        $this->isCurrent = $data['is_current'] ?? null;
        $this->isFinished = $data['finished'] ?? null;
        $this->isPending = $data['pending'] ?? null;
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

    public function isCurrent(): ?bool
    {
        return $this->isCurrent;
    }

    public function isFinished(): ?bool
    {
        return $this->isFinished;
    }

    public function isPending(): ?bool
    {
        return $this->isPending;
    }
}